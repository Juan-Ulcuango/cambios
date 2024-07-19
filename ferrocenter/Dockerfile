# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

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
RUN composer install

# Expone el puerto para el servidor de desarrollo
EXPOSE 8000

# Comando para iniciar la aplicación
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
