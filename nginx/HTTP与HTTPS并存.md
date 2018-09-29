
# HTTP与HTTPS并存

```conf
server {
        listen       80;
        server_name  www.helingfeng.com;
        charset      utf-8;

        listen 443 ssl;
        ssl_certificate /home/wwwroot/workspaces/blog/ssl/full_chain.pem;
        ssl_certificate_key /home/wwwroot/workspaces/blog/ssl/private.key;

        include /etc/letsencrypt/options-ssl-nginx.conf;
        root /home/wwwroot/workspaces/blog/public;

        location ~ ^/.*$ {
                index index.html index.htm;
        }

}
```