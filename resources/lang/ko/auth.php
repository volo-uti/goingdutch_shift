<?php

return [
    'common' => [
        'email'                         => '이메일',
        'nickname'                      => '닉네임 (3글자 이상)',
        'password'                      => '비밀번호 (6글자 이상)',
        'password_confirm'              => '비밀번호 확인',
    ],
    'alert' => [
        'already_user'                  => '이미 존재하는 이메일 주소입니다.',
        'deleted_user'                  => '삭제된 계정입니다.',
        'withdrawal_user'               => '탈퇴한 회원입니다.',
        'empty_email'                   => '이메일 주소를 입력해주세요.',
        'format_email'                  => '이메일 형식이 올바르지 않습니다.',
        'exist_email'                   => '이미 존재하는 이메일 주소입니다.',
        'exist_not_email'               => '존재하지 않는 이메일입니다',
        'empty_password'                => '비밀번호를 입력해주세요.',
        'format_password'               => '비밀번호 양식에 맞지 않습니다.',
        'length_password'               => '비밀번호의 길이는 6~20 글자여야 합니다.',
        'empty_password_confirm'        => '비밀번호 확인을 입력해주세요.',
        'different_password'            => '비밀번호 확인 문구가 다릅니다.',
        'previous_password'             => '이전 비밀번호 입니다.',
        'validation_password'           => '4개 조합, 소문자(a-z), 대문자(A-Z), 숫자(0-9), 특수 문자(!, $, #, %)',
        'change_password'               => '비밀번호가 변경되었습니다.',
        'exist_nickname'                => '이미 사용 중인 닉네임입니다.',
        'empty_nickname'                => '닉네임을 입력해주세요.',
        'length_nickname'               => '닉네임의 길이는 6~50 글자여야 합니다.',
        'warning_confirm'               => '이메일 인증 후 사용해주세요.',
        'warning_login'                 => '계정 주소 혹은 비밀번호가 틀렸습니다.',
        'warning_register'              => '계정 생성에 실패하였습니다.',
        'email_send'                    => '주소로 이메일이 발송되었습니다.',
        'reason_withdrawal'             => '탈퇴 사유를 선택해주세요.',
        'not_found_user'                => '존재하지 않는 회원입니다.',
        'sns_login_error'               => '소셜 로그인 과정에서 문제가 생겼습니다.',
        'sns_login_agree'               => '소셜 로그인 권한에 동의해주시기 바랍니다.',
        'sns_login_email'               => '소셜 로그인 Email 제공에 동의해주세요.',
        'not_found_token'               => '소셜 로그인 토큰을 찾을 수 없습니다.',
    ],
    'login' => [
        'title'                         => '로그인',
        'description'                   => '설명',
        'login_btn'                     => '로그인',
        'login_facebook'                => '페이스북 로그인',
        'not_user'                      => '아직 회원이 아니십니까?',
    ],

];
