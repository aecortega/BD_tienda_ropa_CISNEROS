create database `bd_tienda_ropa_aeco`;

use `bd_tienda_ropa_aeco`;

CREATE TABLE `usuarios` (
  `id_usuario` int(9) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id_usuario`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `inventario` (
  `id_producto` int(11) NOT NULL,
  `cantidad_en_estock` int(100) NOT NULL,
  `tallas_disponibles` varchar(100) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `n_producto` varchar(50) NOT NULL,
  `fecha_de_reposicion` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
    PRIMARY KEY  (`id_producto`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;