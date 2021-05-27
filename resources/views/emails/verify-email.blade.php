<body>
    <h3>{{ trans('main.Pochti_gotovo') }}</h3>
    <p>
        {{ trans('main.Hello', ['name' => $user->name]) }}
    </p>
    <p>
        {{ trans('main.Text_verify_email', ['email' => $user->email]) }}.
    </p>
    <p>
        <form action="{{ route('verify', app()->getLocale()) }}" method="get" >
            <input type="hidden" name="id" value="{{ $user->id }}" />
            <input type="hidden" name="code" value="{{ $user->remember_token }}" />
            <input type="submit" value="{{ trans('main.Btn_Confirm_verify_email') }}"  />
        </form>
    </p>
    <p>
        <strong>{{ trans('main.Text_verify_email_1') }}</strong>
        <br/>
        {{ trans('main.Footer_verify_email') }} <a href="{{ env('APP_URL') }}" target="_blank" >{{ trans('main.Detailed') }}</a>.
    </p>
</body>
