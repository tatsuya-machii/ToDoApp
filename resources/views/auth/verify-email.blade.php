<!-- Email Verfication(認証メール)の内容 -->
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
          <!-- {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }} -->
          ご登録ありがとうございます。
          ご入力いただいたメールアドレスへ認証リンクを送信しましたので、クリックして認証を完了させてください。<br>
          もし、認証メールが届かない場合は再送させていただきます。
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                <!-- {{ __('A new verification link has been sent to the email address you provided during registration.') }} -->
                新しい認証メールが送信されました。
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        <!-- {{ __('Resend Verification Email') }} -->
                        認証メールを再送する
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    <!-- {{ __('Logout') }} -->
                    ログアウト
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
