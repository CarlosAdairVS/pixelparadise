-- Crea una nueva base de datos llamada 'pixelparadise'
CREATE DATABASE pixelparadise;

-- Selecciona la base de datos 'pixelparadise' para usar
USE pixelparadise;

-- Configura el modo SQL para no asignar automáticamente un valor de cero a las columnas auto_increment
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Inicia una nueva transacción
START TRANSACTION;

-- Establece la zona horaria a UTC
SET time_zone = "+00:00";

-- Crea la tabla 'compra' con las columnas especificadas
CREATE TABLE `compra` (
  `purchase_id` int(11) NOT NULL, -- Identificador único de la compra
  `user_id` int(11) NOT NULL, -- Identificador del usuario que realizó la compra
  `id_videojuego` int(11) NOT NULL, -- Identificador del videojuego comprado
  `purchase_date` date NOT NULL -- Fecha de la compra
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Crea la tabla 'library' con las columnas especificadas
CREATE TABLE `library` (
  `user_id` int(11) NOT NULL, -- Identificador del usuario que posee el videojuego
  `id_videojuego` int(11) NOT NULL, -- Identificador del videojuego en la biblioteca del usuario
  `acq_date` date NOT NULL -- Fecha de adquisición del videojuego
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Crea la tabla 'users' con las columnas especificadas
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL, -- Identificador único del usuario
  `type_user` tinyint(1) NOT NULL, -- Tipo de usuario (puede ser un campo booleano)
  `real_name` varchar(64) NOT NULL, -- Nombre real del usuario
  `l_name` varchar(64) NOT NULL, -- Apellido del usuario
  `ml_name` varchar(64) NOT NULL, -- Segundo apellido del usuario
  `email` varchar(255) NOT NULL, -- Correo electrónico del usuario
  `password` varchar(255) NOT NULL, -- Contraseña del usuario
  `disabled` tinyint(1) NOT NULL DEFAULT '0' -- Indica si el usuario está deshabilitado (0 = activo, 1 = deshabilitado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Crea la tabla 'user_inf' con las columnas especificadas
CREATE TABLE `user_inf` (
  `avatar_id` int(11) NOT NULL, -- Identificador único del avatar
  `user_id` int(11) NOT NULL, -- Identificador del usuario al que pertenece el avatar
  `user_name` varchar(64) NOT NULL DEFAULT '', -- Nombre de usuario
  `birthday_date` date NOT NULL, -- Fecha de nacimiento del usuario
  `create_date` date NOT NULL, -- Fecha de creación del perfil
  `profile_pic` varchar(255) NOT NULL DEFAULT '', -- URL de la imagen del perfil
  `pic_path` varchar(255) NOT NULL DEFAULT '' -- Ruta de la imagen del perfil
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Crea la tabla 'videojuegos' con las columnas especificadas
CREATE TABLE `videojuegos` (
  `id_videojuego` int(11) NOT NULL, -- Identificador único del videojuego
  `nombre_juego` varchar(255) DEFAULT NULL, -- Nombre del videojuego
  `descripcion` varchar(1500) NOT NULL, -- Descripción del videojuego
  `precio` float UNSIGNED DEFAULT NULL, -- Precio del videojuego
  `imagen_portada` varchar(255) NOT NULL, -- URL de la imagen de portada del videojuego
  `imagen_1` varchar(255) NOT NULL, -- URL de la primera imagen del videojuego
  `imagen_2` varchar(255) NOT NULL -- URL de la segunda imagen del videojuego
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Agrega claves primarias y foráneas a la tabla 'compra'
ALTER TABLE `compra`
  ADD PRIMARY KEY (`purchase_id`), -- Clave primaria de la tabla
  ADD KEY `relation_user_purchase` (`user_id`), -- Índice para la relación con la tabla 'users'
  ADD KEY `relation_game_purchase` (`id_videojuego`); -- Índice para la relación con la tabla 'videojuegos'

-- Agrega claves foráneas a la tabla 'library'
ALTER TABLE `library`
  ADD KEY `relation_user_library` (`user_id`), -- Índice para la relación con la tabla 'users'
  ADD KEY `relation_game_library` (`id_videojuego`); -- Índice para la relación con la tabla 'videojuegos'

-- Agrega la clave primaria a la tabla 'users'
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`); -- Clave primaria de la tabla

-- Agrega claves primarias y foráneas a la tabla 'user_inf'
ALTER TABLE `user_inf`
  ADD PRIMARY KEY (`avatar_id`), -- Clave primaria de la tabla
  ADD KEY `relation_user_info` (`user_id`); -- Índice para la relación con la tabla 'users'

-- Agrega la clave primaria a la tabla 'videojuegos'
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id_videojuego`); -- Clave primaria de la tabla

-- Modifica la columna 'purchase_id' de la tabla 'compra' para que sea auto_incremental
ALTER TABLE `compra`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

-- Modifica la columna 'user_id' de la tabla 'users' para que sea auto_incremental
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Modifica la columna 'avatar_id' de la tabla 'user_inf' para que sea auto_incremental
ALTER TABLE `user_inf`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Modifica la columna 'id_videojuego' de la tabla 'videojuegos' para que sea auto_incremental
ALTER TABLE `videojuegos`
  MODIFY `id_videojuego` int(11) NOT NULL AUTO_INCREMENT;

-- Agrega restricciones de clave foránea a la tabla 'compra'
ALTER TABLE `compra`
  ADD CONSTRAINT `relation_game_purchase` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id_videojuego`), -- Relación con la tabla 'videojuegos'
  ADD CONSTRAINT `relation_user_purchase` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`); -- Relación con la tabla 'users'

-- Agrega restricciones de clave foránea a la tabla 'library'
ALTER TABLE `library`
  ADD CONSTRAINT `relation_game_library` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id_videojuego`), -- Relación con la tabla 'videojuegos'
  ADD CONSTRAINT `relation_user_library` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`); -- Relación con la tabla 'users'

-- Agrega restricciones de clave foránea a la tabla 'user_inf'
ALTER TABLE `user_inf`
  ADD CONSTRAINT `relation_user_info` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`); -- Relación con la tabla 'users'

-- Finaliza la transacción
COMMIT;

