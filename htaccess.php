RewriteEngine On

# If the requested file or directory does not exist
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Redirect all other requests to index.php
RewriteRule ^ index.php [QSA,L]