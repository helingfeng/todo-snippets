
## HTTP强制重定向HTTPS

```conf
server {
        listen       80;
        server_name  www.helingfeng.com;
        charset      utf-8;

        # 301 重定向
        return 301 https://$server_name$request_uri;
}

server {
        server_name  www.helingfeng.com;
        charset      utf-8;

        listen 443 ssl;

        # freeSSL 免费正式 https://freessl.org/
        ssl_certificate /home/ssl/full_chain.pem;
        ssl_certificate_key /home/ssl/private.key;

        include /etc/letsencrypt/options-ssl-nginx.conf;
        root /home/blog;

        location ~ ^/.*$ {
                index index.html index.htm;
        }
}
```