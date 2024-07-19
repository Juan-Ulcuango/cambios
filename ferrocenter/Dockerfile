# Usa una imagen base de PHP con Apache  
FROM php:8.1-apache  

# Instala las extensiones necesarias para Laravel  
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*  

# Instala las dependencias necesarias y Composer  
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  

# Establece el directorio de trabajo  
WORKDIR /app  

# Copia los archivos de la aplicación al contenedor  
COPY . /app/  

# Instala las dependencias de Composer  
RUN composer install --no-interaction --optimize-autoloader  

# Cambiar permisos para que Apache tenga acceso  
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache  

# Expone el puerto para el servidor de Apache  
EXPOSE 80  

# Comando por defecto de Apache  
CMD ["apache2-foreground"]