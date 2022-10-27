<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Exception;

class GitHubController
{
    public function __invoke()
    {
        $url = 'https://github.com/login/oauth/access_token';
        $parameters = [
            'client_id' => getenv('OAUTH_GITHUB_CLIENT_ID'),
            'client_secret' => getenv('OAUTH_GITHUB_CLIENT_SECRET'),
            'redirect_uri' => getenv('OAUTH_GITHUB_REDIRECT_URI'),
            'code' => request()->input('code'),
        ];
        $url .= '?' . http_build_query($parameters);
        $response = Http::post($url);

        if (!$response->ok()) {
            throw new Exception('erorr');
        }

        $data = [];
        parse_str($response->body(), $data);

        if (!isset($data['access_token'])) {
            return redirect()->route('auth.login');
        }

        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token'],
        ])->get('https://api.github.com/user');

        if (!$this->createUser($user->json())) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('admin.panel');
    }

    /**
     * @param array $userInfo
     * @return bool
     */
    protected function createUser(array $userInfo): bool
    {
        if (!isset($userInfo['email'])) {
            return false;
        }

        $user = User::where('email', $userInfo['email'])->first();
        if (empty($user)) {
            $user = User::create([
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'role_name' => 'customer',
                'password' => Hash::make($userInfo['id'] . '_' . $userInfo['node_id']),
            ]);
        }
        Auth::login($user);

        return true;
    }
}
