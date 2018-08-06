### tips

~: openssl genrsa 2048 > my-site-com.key
~: openssl req -x509 -days 1000 -new -key my-site-com.key -out my-site-com.pem