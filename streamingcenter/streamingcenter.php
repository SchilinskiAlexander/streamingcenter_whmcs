<?php
// WHMCS module for the Streaming.Center Internet-Radio control panel.
// https://streaming.center

use Carbon\Carbon;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function streamingcenter_MetaData()
{
    return array(
        'DisplayName' => 'Streaming.Center',
        'RequiresServer' => true,
        'DefaultNonSSLPort' => '2345',
        'DefaultSSLPort' => '2345',
        'ServiceSingleSignOnLabel' => 'Login to Streaming.Center Broadcaster interface',
        'AdminSingleSignOnLabel' => 'Login to Streaming.Center Admin area',
        'ListAccountsUniqueIdentifierDisplayName' => 'Username',
        'ListAccountsUniqueIdentifierField' => 'username',
        'ListAccountsProductField' => 'configoption1',
    );
}

function streamingcenter_ConfigOptions() {
    return [
        # configoption1
        "template" => [
            "FriendlyName" => "Radio Account Template",
            "Type"         => "text",
            "Size"         => "50",
            "Loader"       => "streamingcenter_LoadBroadcasterTemplates",
            "Description"  => "<br />Created in Streaming.Center admin area",
            "Default"      => "",
            "SimpleMode"   => true,
        ],
        # configoption2
        "server_type" => [
            "FriendlyName" => "Streaming Server Type",
            "Type"         => "dropdown",
            "Options"      => [
                'icecast-kh' => 'Icecast-KH',
                'icecast' => 'Icecast',
                'shoutcast1' => 'Shoutcast 1',
                'shoutcast2' => 'Shoutcast 2',
                'shoutcast2.6' => 'Shoutcast 2.6',
            ],
            "Description" => "Select the type of streaming server to use for this account. Icecast-KH is recommended for best compatibility.",
            "Default"      => "icecast-kh",
            "SimpleMode"   => true,
        ],
        # configoption3
        "limit_stations" => [
            "FriendlyName" => "Radio stations limit",
            "Type"         => "text",
            "Description"  => "0 For unlimited",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],
        # configoption4
        "limit_streams" => [
            "FriendlyName" => "Radio channels limit",
            "Type"         => "text",
            "Description"  => "0 For unlimited",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],
        # configoption5
        "limit_listeners" => [
            "FriendlyName" => "Listeners limit",
            "Type"         => "text",
            "Description"  => "0 For unlimited",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],

        # configoption6
        "limit_bitrate" => [
            "FriendlyName" => "Maximum bitrate",
            "Type"         => "dropdown",
            "Options"      => [
                '0' => 'Unlimited',
                '24' => '24 kbps',
                '32' => '32 kbps',
                '64' => '64 kbps',
                '96' => '96 kbps',
                '128' => '128 kbps',
                '192' => '192 kbps',
                '256' => '256 kbps',
                '320' => '320 kbps',
            ],
            "Description" => "<br/ > Set the maximum bitrate for this account.",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],
        # configoption7
        "limit_du" => [
            "FriendlyName" => "Disk quota (megabytes)",
            "Type"         => "text",
            "Description"  => "0 For unlimited",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],
        # configoption8
        "limit_traffic" => [
            "FriendlyName" => "Traffic per month (megabytes)",
            "Type"         => "text",
            "Description"  => "0 For unlimited",
            "Default"      => "0",
            "SimpleMode"   => true,
        ],
        # configoption9
        "youtube_streaming_enabled" => [
            "FriendlyName" => "Allow Youtube streaming",
            "Type"         => "yesno",
            "Description"  => "Increased CPU load",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
        # configoption10
        "fb_streaming_enabled" => [
            "FriendlyName" => "Allow Facebook streaming",
            "Type"         => "yesno",
            "Description"  => "Increased CPU load",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
        # configoption11
        "vk_streaming_enabled" => [
            "FriendlyName" => "Allow VK.com streaming",
            "Type"         => "yesno",
            "Description"  => "Increased CPU load",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
        # configoption12
        "tg_streaming_enabled" => [
            "FriendlyName" => "Allow Telegram streaming",
            "Type"         => "yesno",
            "Description"  => "Increased CPU load",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
        # configoption13
        "geoblocking_enabled" => [
            "FriendlyName" => "Enable GeoBlocking",
            "Type"         => "yesno",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],

        # configoption14
        "stereo_tool_enabled" => [
            "FriendlyName" => "StereoTool",
            "Type"         => "yesno",
            "Description"  => "Enable StereoTool audio processing",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],

        # configoption15
        "url_branding_enabled" => [
            "FriendlyName" => "Allow URL Branding",
            "Type"         => "yesno",
            "Description"  => "User can set custom URL for the station",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],

        # configoption16
        "website_enabled" => [
            "FriendlyName" => "Enable radio mini-Website",
            "Type"         => "yesno",
            "Description"  => "Radio station starter page",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],

        # configoption17
        "tts_enabled" => [
            "FriendlyName" => "Enable Text-to-Speech",
            "Type"         => "yesno",
            "Description"  => "Convert text to speech for the station, additional costs applies",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
        
        # configoption18
        "podcasts_enabled" => [
            "FriendlyName" => "Enable Podcasts",
            "Type"         => "yesno",
            "Description"  => "Allow podcasts public page and management",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
    
        # configoption18
        "save_dj_streams_enabled" => [
            "FriendlyName" => "Enable Live stream recording",
            "Type"         => "yesno",
            "Description"  => "High disk space consumption",
            "Default"      => "no",
            "SimpleMode"   => true,
        ],
    ];
}

/**
 * Make API request to Streaming.Center server
 */
function streamingcenter_makeApiRequest($params, $endpoint, $method = 'POST', $postData = []) {
    $url = $params['serverhttpprefix'] . "://" . $params['serverhostname'] . ":" . $params['serverport'] . $endpoint;
    
    if (!extension_loaded('curl')) {
        return [
            'success' => false,
            'error' => 'CURL extension is not installed'
        ];
    }
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERPWD => $params['serverusername'] . ":" . $params['serverpassword'],
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
    ]);
    
    // Add server credentials for API
    $defaultParams = [
        'server_username' => $params['serverusername'],
        'server_password' => $params['serverpassword']
    ];
    
    $allParams = array_merge($defaultParams, $postData);
    
    if ($method === 'GET') {
        $queryString = http_build_query($allParams);
        curl_setopt($ch, CURLOPT_URL, $url . '?' . $queryString);
    } elseif ($method === 'PATCH') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($allParams));
    } else {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($allParams));
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($response === false || !empty($curlError)) {
        return [
            'success' => false,
            'error' => 'CURL Error: ' . $curlError
        ];
    }
    
    $data = json_decode($response);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            'success' => false,
            'error' => 'Invalid JSON response: ' . json_last_error_msg()
        ];
    }
    
    if ($httpCode !== 200) {
        $errorMsg = isset($data->error) ? $data->error : 'HTTP Error ' . $httpCode;
        return [
            'success' => false,
            'error' => $errorMsg
        ];
    }
    
    if (isset($data->error)) {
        return [
            'success' => false,
            'error' => $data->error
        ];
    }
    
    return [
        'success' => true,
        'data' => $data
    ];
}

function streamingcenter_ListAccounts(array $params) {
    $accounts = [];
    $endpoint = "/api/v1/remote_get_all_broadcasters/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'GET');
        
        if (!$response['success']) {
            return [
                'success' => false,
                'error' => $response['error']
            ];
        }
        
        $data = $response['data'];
        if (isset($data->broadcasters) && is_array($data->broadcasters)) {
            foreach ($data->broadcasters as $account) {
                $joinDate = isset($account->date_joined) ? Carbon::parse($account->date_joined) : Carbon::now();
                
                // Map remote status to WHMCS domain status
                $domainStatus = 'Active';
                if (isset($account->account_status)) {
                    switch ($account->account_status) {
                        case 3:
                            $domainStatus = 'Suspended';
                            break;
                        case 1:
                            $domainStatus = 'Terminated';
                            break;
                    }
                }
                
                $accounts[] = [
                    'email' => $account->email ?? '',
                    'username' => $account->username ?? '',
                    'password' => $account->password_plain ?? '',
                    'uniqueIdentifier' => $account->username ?? '',
                    'product' => '',
                    'primaryip' => '',
                    'created' => $joinDate->format('Y-m-d H:i:s'),
                    'domainstatus' => $domainStatus,
                    'status' => $domainStatus,
                ];
            }
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", count($accounts), count($accounts));
        
        return [
            'success' => true,
            'accounts' => $accounts,
        ];
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return [
            'success' => false,
            'error' => $e->getMessage(),
        ];
    }
}

function streamingcenter_LoadBroadcasterTemplates($params){
    $endpoint = "/api/v1/remote_get_templates/";

    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST');
        
        if (!$response['success']) {
            return ['no_template' => 'Error: failed to load templates: ' . $response['error']];
        }
        
        $data = $response['data'];
        $list = [];
        
        if (isset($data->broadcaster_templates)) {
            foreach ($data->broadcaster_templates as $template_name) {
                $list[$template_name] = "Broadcaster: " . $template_name;
            }
        }
        
        if (isset($data->reseller_templates)) {
            foreach ($data->reseller_templates as $template_name) {
                $list[$template_name] = "Reseller: " . $template_name;
            }
        }
        
        $list['no_template'] = 'No Template';
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", count($list), count($list));
        return $list;
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        throw new Exception($e->getMessage());
    }
}

function streamingcenter_ClientArea(array $params)
{
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        // Get account details from API
        $endpoint = "/api/v1/remote_get_details/";
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        $accountData = [];
        if ($response['success']) {
            $accountData = $response['data'];
        }
        
        // Prepare template variables
        $templateVars = [
            'username' => $params['username'],
            'domain' => $params['domain'],
            'serverip' => $params['serverip'],
            'serverport' => $params['serverport'],
            'accountData' => $accountData,
            'serviceSingleSignOnEnabled' => true,
            'serviceSingleSignOnUrl' => '',
        ];
        
        // Generate Single Sign-On URL if available
        $ssoResult = streamingcenter_ServiceSingleSignOn($params, true);
        if (isset($ssoResult['url'])) {
            $templateVars['serviceSingleSignOnUrl'] = $ssoResult['url'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        
        return [
            'templatefile' => 'clientarea',
            'vars' => $templateVars,
        ];
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        
        return [
            'templatefile' => 'clientarea',
            'vars' => [
                'error' => 'Unable to load account information: ' . $e->getMessage(),
            ],
        ];
    }
}
function streamingcenter_ServiceSingleSignOn(array $params, $from_client = false)
{
    $endpoint = "/api/v1/remote_user_login/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            if($from_client){
                return [];
            }
            return [
                'success' => false,
                'errorMsg' => $response['error']
            ];
        }
        
        $data = $response['data'];
        if (isset($data->url)) {
            logModuleCall('streamingcenter', __FUNCTION__, "success", "redirectTo", $data->url);
            if($from_client){
                // If called from client area, return redirect URL
                return [
                    'url' => $data->url
                ];
            }
            return [
                'success' => true,
                'redirectTo' => $data->url
            ];

        }
        if($from_client){
            return [];
        }
        return [
            'success' => false,
            'errorMsg' => 'No redirect URL received'
        ];        
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        if($from_client){
            return [];
        }

        return [
            'success' => false,
            'errorMsg' => $e->getMessage(),
        ];
    }
}

function streamingcenter_AdminSingleSignOn(array $params)
{
    $endpoint = "/api/v1/remote_admin_login/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['serverusername'],
            'password' => $params['serverpassword']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            return [
                'success' => false,
                'errorMsg' => $response['error']
            ];
        }
        
        $data = $response['data'];
        if (isset($data->token)) {
            $redirectUrl = $params['serverhttpprefix'] . "://" . $params['serverhostname'] . ":" . $params['serverport'] . "/login/?token=" . $data->token;
            
            logModuleCall('streamingcenter', __FUNCTION__, "success URL: " . $redirectUrl, "success", "success");
            return [
                'success' => true,
                'redirectTo' => $redirectUrl,
            ];
        }
        
        return [
            'success' => false,
            'errorMsg' => 'No token received'
        ];
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return [
            'success' => false,
            'errorMsg' => $e->getMessage(),
        ];
    }
}

function streamingcenter_CreateAccount(array $params)
{
    $endpoint = "/api/v1/remote_bcaster_create_from_template/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, "Creating account, username: " . $params['username'], "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'email' => $params['clientsdetails']['email'],
            'password' => $params['password']
        ];
        
        // Handle template configuration
        if ($params['configoption1'] != 'no_template') {
            $postData['template'] = $params['configoption1'];
        } else {
            // Create a broadcaster account without a template
            $postData = array_merge($postData, [
                'template' => "no_template",
                'server_type' => $params['configoption2'],
                'limit_stations' => $params['configoption3'],
                'limit_streams' => $params['configoption4'],
                'limit_listeners' => $params['configoption5'],
                'limit_bitrate' => $params['configoption6'],
                'limit_du' => $params['configoption7'],
                'limit_traffic' => $params['configoption8'],
                'youtube_streaming_enabled' => $params['configoption9'],
                'fb_streaming_enabled' => $params['configoption10'],
                'vk_streaming_enabled' => $params['configoption11'],
                'tg_streaming_enabled' => $params['configoption12'],
                'geoblocking_enabled' => $params['configoption13'],
                'stereo_tool_enabled' => $params['configoption14'],
                'url_branding_enabled' => $params['configoption15'],
                'website_enabled' => $params['configoption16'],
                'tts_enabled' => $params['configoption17'],
                'podcasts_enabled' => $params['configoption18'],
                'save_dj_streams_enabled' => $params['configoption19'],
            ]);        
        }
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            $messages = [
                'invalid_params' => "Missing required parameters",
                'username_exists' => "Username already exists",
                'empty_username' => "Missing account username",
                'username_unique' => "Username already exists",
                'non_field_errors_licence_no_more_stations' => "Your license does not allow creating more broadcaster accounts. To create more accounts update your license",
            ];
            
            $errorKey = $response['error'];
            $errorMsg = isset($messages[$errorKey]) ? $messages[$errorKey] : $errorKey;
            
            return "Error: " . $errorMsg;
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return "Exception: " . $e->getMessage();
    }
}

function streamingcenter_ChangePackage(array $params) {
    $endpoint = "/api/v1/remote_update_client/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
        ];

        if ($params['configoption1'] != 'no_template') {
            $postData['template'] = $params['configoption1'];
        } else {
            $postData = array_merge($postData, [
                'template' => "no_template",
                'server_type' => $params['configoption2'],
                'limit_stations' => $params['configoption3'],
                'limit_streams' => $params['configoption4'],
                'limit_listeners' => $params['configoption5'],
                'limit_bitrate' => $params['configoption6'],
                'limit_du' => $params['configoption7'],
                'limit_traffic' => $params['configoption8'],
                'youtube_streaming_enabled' => $params['configoption9'] == 'on' ? true : false,
                'fb_streaming_enabled' => $params['configoption10'] == 'on' ? true : false,
                'vk_streaming_enabled' => $params['configoption11'] == 'on' ? true : false,
                'tg_streaming_enabled' => $params['configoption12'] == 'on' ? true : false,
                'geoblocking_enabled' => $params['configoption13'] == 'on' ? true : false,
                'stereo_tool_enabled' => $params['configoption14'] == 'on' ? true : false,
                'url_branding_enabled' => $params['configoption15'] == 'on' ? true : false,
                'website_enabled' => $params['configoption16'] == 'on' ? true : false,
                'tts_enabled' => $params['configoption17'] == 'on' ? true : false,
                'podcasts_enabled' => $params['configoption18'] == 'on' ? true : false,
                'save_dj_streams_enabled' => $params['configoption19'] == 'on' ? true : false,
            ]);        
        }
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'PATCH', $postData);
        
        if (!$response['success']) {
            return "Error: " . $response['error'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return "Exception: " . $e->getMessage();
    }
}

function streamingcenter_SuspendAccount(array $params) {
    $endpoint = "/api/v1/remote_user_suspend/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            return "Error: " . $response['error'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return "Exception: " . $e->getMessage();
    }
}

function streamingcenter_UnsuspendAccount(array $params)
{
    $endpoint = "/api/v1/remote_user_unsuspend/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            return 'Error: ' . $response['error'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return [
            'success' => false,
            'errorMsg' => $e->getMessage(),
        ];
    }
}

function streamingcenter_TerminateAccount(array $params)
{
    $endpoint = "/api/v1/remote_user_delete/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            return "Error: " . $response['error'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return "Exception: " . $e->getMessage();
    }
}

function streamingcenter_AdminServicesTabFields(array $params)
{
    $endpoint = "/api/v1/remote_get_details/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            logModuleCall('streamingcenter', __FUNCTION__, "error: " . $response['error'], "error", "error");
            return [];
        }
        
        $data = $response['data'];
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        
        $bitrates = [0, 24, 32, 64, 96, 128, 192, 256, 320];
        $bitratesOptions = '';
        foreach ($bitrates as $rate) {
            $selected = (isset($data->limit_bitrate) && $data->limit_bitrate == $rate) ? 'selected' : '';
            $label = $rate == 0 ? 'Unlimited' : $rate . ' kbps';
            $bitratesOptions .= '<option value="' . $rate . '" ' . $selected . '>' . $label . '</option>';
        }

        return [
            'Radio account status' => '<b>'.$data->account_status_display.'</b>',
            'Port' => '<input type="number" name="streamingcenter_panel_port" value="' . ($data->panel_port ?? '') . '" />',
            'Station Name' => '<input type="text" size=50 name="streamingcenter_station_name" value="' . ($data->station_name ?? '') . '" />',
            'Website' => '<input type="url" size=50 name="streamingcenter_website_url" value="' . ($data->website_url ?? '') . '" />',
            'Radio stations limit' => '<input type="number" name="streamingcenter_limit_stations" min="0" value="' . ($data->limit_stations ?? '') . '" />',
            'Radio channels limit' => '<input type="number" name="streamingcenter_limit_streams" min="0" value="' . ($data->limit_streams ?? '') . '" />',
            'Listeners limit' => '<input type="number" name="streamingcenter_limit_listeners" min="0" value="' . ($data->limit_listeners ?? '') . '" />',
            'Maximum bitrate' => '<select name="streamingcenter_limit_bitrate">'.$bitratesOptions.'</select>',
            'Disk quota (megabytes)' => '<input type="number" name="streamingcenter_limit_du" min="0" value="' . ($data->limit_du ?? '') . '" />',
            'Traffic per month (megabytes)' => '<input type="number" name="streamingcenter_limit_traffic" min="0" value="' . ($data->limit_traffic ?? '') . '" />',
            'Allow Youtube streaming' => '<input type="checkbox" name="streamingcenter_youtube_streaming_enabled" value="on" '.($data->youtube_streaming_enabled ? 'checked' : '').' />',
            'Allow Facebook streaming' => '<input type="checkbox" name="streamingcenter_fb_streaming_enabled" value="on" '.($data->youtube_streaming_enabled ? 'checked' : '').' />',
            'Allow VK.com streaming' => '<input type="checkbox" name="streamingcenter_vk_streaming_enabled" value="on" '.($data->vk_streaming_enabled ? 'checked' : '').' />',
            'Allow Telegram streaming' => '<input type="checkbox" name="streamingcenter_tg_streaming_enabled" value="on" '.($data->tg_streaming_enabled ? 'checked' : '').' />',
            'Enable GeoBlocking' => '<input type="checkbox" name="streamingcenter_geoblocking_enabled" value="on" '.($data->geoblocking_enabled ? 'checked' : '').' />',
            'Enable StereoTool audio processing' => '<input type="checkbox" name="streamingcenter_stereo_tool_enabled" value="on" '.($data->stereo_tool_enabled ? 'checked' : '').' />',
            'User can set custom URL for the station' => '<input type="checkbox" name="streamingcenter_url_branding_enabled" value="on" '.($data->url_branding_enabled ? 'checked' : '').' />',
            'Enable radio mini-Website' => '<input type="checkbox" name="streamingcenter_website_enabled" value="on" '.($data->website_enabled ? 'checked' : '').' />',
            'Enable Text-to-Speech' => '<input type="checkbox" name="streamingcentertts_enabled" value="on" '.($data->tts_enabled ? 'checked' : '').' />',
            'Enable Podcasts' => '<input type="checkbox" name="streamingcenter_podcasts_enabled" value="on" '.($data->podcasts_enabled ? 'checked' : '').' />',
            'Enable Live stream recording' => '<input type="checkbox" name="streamingcenter_save_dj_streams_enabled" value="on" '.($data->save_dj_streams_enabled ? 'checked' : '').' />',
        ];
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return [];
    }
}

function streamingcenter_AdminServicesTabFieldsSave(array $params)
{
    $endpoint = "/api/v1/remote_update_client/";
    
    try {
        
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");

        $postData = [
            
        ];

        $postData = array_merge($postData, [
            'template' => "no_template",
            'username' => $params['username'],

            'station_name' => $_REQUEST['streamingcenter_station_name'],
            'website_url' => $_REQUEST['streamingcenter_website_url'],

            'limit_stations' => $_REQUEST['streamingcenter_limit_stations'],
            'limit_streams' => $_REQUEST['streamingcenter_limit_streams'],
            'limit_listeners' => $_REQUEST['streamingcenter_limit_listeners'],
            'limit_bitrate' => $_REQUEST['streamingcenter_limit_bitrate'],
            'limit_du' => $_REQUEST['streamingcenter_limit_du'],
            'limit_traffic' => $_REQUEST['streamingcenter_limit_traffic'],

            'youtube_streaming_enabled' => isset($_REQUEST['streamingcenter_youtube_streaming_enabled']) ? true : false,
            'fb_streaming_enabled' => isset($_REQUEST['streamingcenter_fb_streaming_enabled']) ? true : false,
            'vk_streaming_enabled' => isset($_REQUEST['streamingcenter_vk_streaming_enabled']) ? true : false,
            'tg_streaming_enabled' => isset($_REQUEST['streamingcenter_tg_streaming_enabled']) ? true : false,
            'geoblocking_enabled' => isset($_REQUEST['streamingcenter_geoblocking_enabled']) ? true : false,
            'stereo_tool_enabled' => isset($_REQUEST['streamingcenter_stereo_tool_enabled']) ? true : false,
            'url_branding_enabled' => isset($_REQUEST['streamingcenter_url_branding_enabled']) ? true : false,
            'website_enabled' => isset($_REQUEST['streamingcenter_website_enabled']) ? true : false,
            'tts_enabled' => isset($_REQUEST['streamingcentertts_enabled']) ? true : false,
            'podcasts_enabled' => isset($_REQUEST['streamingcenter_podcasts_enabled']) ? true : false,
            'save_dj_streams_enabled' => isset($_REQUEST['streamingcenter_save_dj_streams_enabled']) ? true : false,
        ]);
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'PATCH', $postData);
        
        if (!$response['success']) {
            
            return [
                'success' => false,
                'error' => $response['error'],
            ];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return "Exception: " . $e->getMessage();
    }
}

function streamingcenter_TestConnection(array $params)
{
    $endpoint = "/api/v1/remote_admin_login/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['serverusername'],
            'password' => $params['serverpassword']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'POST', $postData);
        
        if (!$response['success']) {
            return [
                'success' => false,
                'error' =>  $response['error']
            ];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return [
            'success' => true,
            'error' => "success"
        ];
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return [
            'success' => false,
            'error' => $e->getMessage(),
        ];
    }
}

function streamingcenter_ChangePassword(array $params) {
    $endpoint = "/api/v1/remote_change_password/";
    
    try {
        logModuleCall('streamingcenter', __FUNCTION__, $params, "start", "start");
        
        $postData = [
            'username' => $params['username'],
            'new_password' => $params['password']
        ];
        
        $response = streamingcenter_makeApiRequest($params, $endpoint, 'PATCH', $postData);
        
        if (!$response['success']) {
            return "Error: " . $response['error'];
        }
        
        logModuleCall('streamingcenter', __FUNCTION__, "success", "success", "success");
        return 'success';
        
    } catch (Exception $e) {
        logModuleCall('streamingcenter', __FUNCTION__, $params, $e->getMessage(), $e->getTraceAsString());
        return $e->getMessage();
    }
}
?>
