# Use a base PHP image with MySQL support
FROM php:8.0.28

# Set the working directory inside the container
WORKDIR /app

# Copy the files of your project to the container
COPY . /app

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Install project dependencies
RUN composer install --no-interaction

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# create .env file
RUN cp .env.example .env

# generate key
RUN php artisan key:generate

# Expose the port that your application will use
EXPOSE 8000

