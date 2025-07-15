<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fas fa-broadcast-tower"></i> Radio Account Management
        </h3>
    </div>
    <div class="panel-body">
        
        {if $error}
            <div class="alert alert-danger">
                <strong>Error:</strong> {$error}
            </div>
        {else}
            
            {* Single Sign-On Button *}
            {if $serviceSingleSignOnEnabled && $serviceSingleSignOnUrl}
                <div class="text-center" style="margin-bottom: 30px;">
                    <a href="{$serviceSingleSignOnUrl}" class="btn btn-primary btn-lg" target="_blank" rel="noopener">
                        <i class="fas fa-broadcast-tower"></i>
                        Login as Broadcaster
                    </a>
                </div>
            {/if}
            
            {* Account Information *}
            <div class="row">
                <div class="col-md-6">
                    <h4>Account Details</h4>
                    <table class="table table-striped">
                        <tr>
                            <td><strong>Username:</strong></td>
                            <td>{$username}</td>
                        </tr>
                        {if $accountData->station_name}
                        <tr>
                            <td><strong>Station Name:</strong></td>
                            <td>{$accountData->station_name}</td>
                        </tr>
                        {/if}
                        {if $accountData->website_url}
                        <tr>
                            <td><strong>Website:</strong></td>
                            <td><a href="{$accountData->website_url}" target="_blank">{$accountData->website_url}</a></td>
                        </tr>
                        {/if}
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Account Limits</h4>
                    <table class="table table-striped">
                        {if $accountData->limit_stations}
                        <tr>
                            <td><strong>Radio Stations:</strong></td>
                            <td>{if $accountData->limit_stations == 0}Unlimited{else}{$accountData->limit_stations}{/if}</td>
                        </tr>
                        {/if}
                        {if $accountData->limit_streams}
                        <tr>
                            <td><strong>Radio Channels:</strong></td>
                            <td>{if $accountData->limit_streams == 0}Unlimited{else}{$accountData->limit_streams}{/if}</td>
                        </tr>
                        {/if}
                        {if $accountData->limit_listeners}
                        <tr>
                            <td><strong>Listeners:</strong></td>
                            <td>{if $accountData->limit_listeners == 0}Unlimited{else}{$accountData->limit_listeners}{/if}</td>
                        </tr>
                        {/if}
                        {if $accountData->limit_bitrate}
                        <tr>
                            <td><strong>Max Bitrate:</strong></td>
                            <td>{if $accountData->limit_bitrate == 0}Unlimited{else}{$accountData->limit_bitrate} kbps{/if}</td>
                        </tr>
                        {/if}
                    </table>
                </div>
            </div>
            
            {* Features *}
            {if $accountData->youtube_streaming_enabled || $accountData->fb_streaming_enabled || $accountData->tg_streaming_enabled || $accountData->website_enabled}
            <div class="row">
                <div class="col-md-12">
                    <h4>Enabled Features</h4>
                    <div class="row">
                        {if $accountData->youtube_streaming_enabled}
                        <div class="col-md-3">
                            <div class="alert alert-success text-center">
                                <i class="fab fa-youtube"></i><br>
                                YouTube Streaming
                            </div>
                        </div>
                        {/if}
                        {if $accountData->fb_streaming_enabled}
                        <div class="col-md-3">
                            <div class="alert alert-success text-center">
                                <i class="fab fa-facebook"></i><br>
                                Facebook Streaming
                            </div>
                        </div>
                        {/if}
                        {if $accountData->tg_streaming_enabled}
                        <div class="col-md-3">
                            <div class="alert alert-success text-center">
                                <i class="fab fa-telegram"></i><br>
                                Telegram Streaming
                            </div>
                        </div>
                        {/if}
                        {if $accountData->website_enabled}
                        <div class="col-md-3">
                            <div class="alert alert-success text-center">
                                <i class="fas fa-globe"></i><br>
                                Mini Website
                            </div>
                        </div>
                        {/if}
                    </div>
                </div>
            </div>
            {/if}
            
        {/if}
        
    </div>
</div>