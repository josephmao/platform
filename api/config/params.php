<?php
return [
    'adminEmail' => 'admin@ezijing.com',
    //错误码表
    'codeErrors' => [
        //系统错误码
        'SYSTEM_ERROR'          => ['10001','系统错误'],
        'SERVICE_UNVALIABLE'    => ['10002','服务暂停'],
        'REMOTE_SERVICE_ERROR'  => ['10003','远程服务错误'],
        'IP_LIMITED'            => ['10004','IP限制不能请求该资源'],
        'UNSUPPORTED_MEDIATYPE' => ['10005','不支持的MediaType (%s)'],
        'PARAMS_ERROR'          => ['10006','参数错误'],
        'SYSTEM_BUSY'           => ['10007','任务过多，系统繁忙'],
        'EXECUTION_TIMEOUT'     => ['10008','任务超时'],
        'RPC_ERROR'             => ['10009','RPC错误'],
        'REQUEST_ILLEGAL'       => ['10010','非法请求'],
        'USER_ILLEGAL'          => ['10011','不合法的用户'],
        'ACCESS_DENY'           => ['10012','应用的接口访问权限受限'],
        'PARAMS_MISSING'        => ['10013','缺失必选参数 (%s)'],
        'PARAMS_INVALID'        => ['10014','参数值非法 (%s)'],
        'LENGTH_OVER_LIMIT'     => ['10015','请求长度超过限制'],
        'REQUET_API_NOT_FOUND'  => ['10016','接口不存在'],
        'METHOD_NOT_SUPPORT'    => ['10017','请求的HTTP METHOD不支持，请检查是否选择了正确的POST/GET方式'],
        'IP_OUTOF_RATE_LIMIT'   => ['10018','IP请求频次超过上限'],
        'USER_OUTOF_RATE_LIMIT' => ['10019','用户请求频次超过上限'],
        'SEND_MAIL_FAILED'      => ['10020','邮件发送失败'],
        'ENTITY_NOT_FOUND'      => ['10021', '%s不存在'], // 实体未找到
        'ACTION_FAIL'           => ['10022', '%s失败' ], // 操作失败
        'RESOURCE_ACCESS_DENIED'=> ['10023', '未授权的资源请求'],
        'REAL_NAME_ILLEGAL'     => ['10024', '姓名不符合要求(%s)'],

        //account模块错误码
        'NEED_LOGIN'            => ['20001','需要登录'],
        'ALREADY_LOGGED'        => ['20002','请勿重复登录'],
        'USERNAME_OR_PASSWORD_INVALID' => ['20003','用户名或密码错误'],
        'LOGIN_FAILED'          => ['20004','登录失败，请联系管理员'],
        'UPDATE_AVATAR_FAILED'  => ['20005','修改头像失败'],
        'GET_USERINFO_FAILED'   => ['20006','获取用户信息失败'],
        'ALREADY_LOGOUT'        => ['20007','已经退出登录'],
        'LOGOUT_FAILED'         => ['20007','退出登录失败，请联系管理员'],
        'ORIGION_PASSWORD_INVALIDE'  => ['20008','原密码错误'],
        'RESET_PASSWORD_FAILED' => ['20009','重置密码失败'],

        //enrollment模块错误码
        'REPEAT_REQUEST'                => ['30001','请勿重复提交 %s'],
        'UPLOAD_FILE_ERROR'             => ['30002','上传文件失败 %s'],
        'MISS_INFO'                     => ['30003','信息不全, %s'],
        'SUBMITTED_MODIFY_NOT_ACCEPT'   => ['30004','资料已提交, 不允许修改'],
        'SUBMIT_FAILED'                 => ['30005','%s提交失败'],

        //message 模块错误码
        'STATUS_NOT_ACCEPT_ACTION'        => ['90001','当前状态不允许%s'],
        'TRY_TIMES_OVER'                  => ['90002','尝试次数超限%s'],
        'NOT_THE_SEND_TIME'               => ['90003','未到邮件发送时间(%s)'],


    ],
];