# Pterodactyl webhost egg



How to use:
1. Go to releases and download the json file
2. Import the egg to your panel like you normally do
3. Create a new server, additionally you can enable wordpress, this will install wordpress for you
and you can also install composer packages, this can also be done after the install
4. Setup a proxy, this can by done on nginx, cloudflare and more. Make sure the IP is forwared through $_SERVER['HTTP_X_FORWARDED_FOR']
5. Set the domain name in startup settings
6. Navigate to the domain or given port and ip (ip and port should re-direct to domain) and you are good to go just add you files to the webroot folder (when using wordpress go to https://domain/wp-admin or http://ip:port/wp-admin)

To remove logs from console, open nginx/conf.d/default.conf and uncomment (remove #):

```
#access_log /home/container/naccess.log;
#error_log  /home/container/nerror.log error
```


Originally forked and edited from https://gitlab.com/tenten8401/pterodactyl-nginx
Then https://github.com/Sigma-Production/ptero-eggs


© Sigma Productions 2023
