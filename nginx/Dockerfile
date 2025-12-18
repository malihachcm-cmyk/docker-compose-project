# ============================================================
# DOCKERFILE LESSON - Nginx Reverse Proxy Container
# ============================================================
#
# This Nginx container is different from the one inside React.
#
# React's Nginx: Serves only React static files
# This Nginx: Routes traffic between React and Laravel
#
# Architecture:
#
#   User Request
#        ↓
#   ┌─────────────────────┐
#   │  THIS NGINX         │ ← Main reverse proxy (Port 80)
#   │  (nginx container)  │
#   └─────────────────────┘
#        ↓
#   ┌────┴────┐
#   ↓         ↓
# React    Laravel
# (has its   (PHP-FPM)
# own nginx)
#
# ============================================================

# Start with official Nginx Alpine image (small and secure)
FROM nginx:alpine

# Remove default nginx config
RUN rm /etc/nginx/conf.d/default.conf

# Copy our custom config
# This is the reverse proxy configuration we created
COPY default.conf /etc/nginx/conf.d/

# Create directory for Laravel public files
# Nginx needs access to Laravel's public files for static assets
RUN mkdir -p /var/www/html/public

# Expose port 80
EXPOSE 80

# Start Nginx in foreground
# "daemon off" keeps Nginx running in foreground (required for Docker)
CMD ["nginx", "-g", "daemon off;"]
