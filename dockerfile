# Use the official PHP image with Apache
FROM php:8.1-apache

# Enable Apache mod_rewrite (if needed)
RUN a2enmod rewrite

# Set the working directory to /var/www/html (default for Apache in this image)
WORKDIR /var/www/html

# Copy the PHP application into the container
COPY . /var/www/html/

# Expose the port Apache will run on
EXPOSE 80

# Start the Apache service
CMD ["apache2-foreground"]
