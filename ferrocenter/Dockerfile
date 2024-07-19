# Usar una imagen base que ya tenga PHP y Composer instalados
FROM php:8.2-cli

# Instalar dependencias del sistema necesarias para Composer y Node.js
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    && apt-get clean

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar los archivos del proyecto
COPY . /app

# Instalar dependencias de PHP y Node.js
RUN composer install && npm install --production

# Generar la clave de la aplicación
RUN php artisan key:generate

# Establecer permisos para el almacenamiento y el caché
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Exponer el puerto 8000 para la aplicación
EXPOSE 8000

# Comando para iniciar la aplicación
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
