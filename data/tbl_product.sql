-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2018 a las 03:34:11
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tbl_product`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `info`, `price`) VALUES
(1, 'Funko POP! Movies: DC Justice League - The Flash Toy Figure', '1.jpg', 'From DC, Justice League - The Flash, as a stylized POP vinyl from Funko! Figure stands 3 3/4 inches and comes in a window display box. Check out the other DC figures from Funko! Collect them all!.', 5.50),
(2, 'Japanese Dragon Ball Z Super Saiyan Tenkaichi Budou Kai Son Goku', '2.jpg', 'Super Saiyan Tenkaichi Budou Kai Son Goku 18cm/7\"toy action figure', 7.76),
(3, 'D-FantiX Gans 356 Air UM Magnetic Speed Cube 3x3 Gan 356 Air Magic Cube Puzzle Toy Black\r\n', '3.jpg', 'D-FantiX is a leading puzzle brand on Amazon. We are committed to providing different kinds of puzzle toy and deliver good service to our customer.', 24.89),
(4, 'Smart Watch With Heart/Blood Pressure', '4.jpg', '2018 Newest IP68 Color Screen Waterproof N69 Smart Bracelet Sport Smart Watch With Heart/Blood Pressure Monitor Smart Wristband  \r\n\r\n', 15.69),
(5, 'Funko POP Rides: Game of Thrones - Dragon & Daenerys Action Figure', '5.jpg', 'From Game of Thrones, Daenerys riding Drogon, as a stylized POP Rides vinyl from Funko! Figure stands 4 1/2 inches and comes in a window display box. Check out the other Game of Thrones figures from Funko!', 5.50),
(6, 'JC Rectangular Bayonet Lens Hood for FUJINON XF50mm F2 R WR Lens', '6.jpg', 'Designed to prevent unwanted stray light from entering the lens by extending and shading the end of the lens.', 16.79),
(7, 'HIgh quality silicon led neon light Dotless 12V 24V', '7.jpg', 'LED Neon Strip are perfect for lighting ceiling coves, floor coves, back lighting Perspex or glass, outlining buildings & awnings, etc', 5.40),
(8, 'Motorbike Leather Racing Jacket', '8.jpg', 'Motorbike Racing Leather Jacket is especially designed for professional bikers to fulfill their biking passion on track with great safety.', 165.00),
(9, 'CYSHMILY Self Defense Tool,Emergency Glass Breaker,Tungsten Steel Head Tactical Pen With Credit Card Multitool', '9.jpg', 'Versatile Functionality:Tactical pen will help keep you safe in the dark.', 3.18),
(10, '100kg bale korea used clothing wholesale in bales korea style for west Africa', '10.jpg', 'We are very familiar with the sorting ways for different countries worldwide. There are always different countries.', 3000.00),
(11, 'Hot Selling Adjustable Sublimation Custom Guitar Strap with Leather End\r\n', '11.jpg', 'Heat transfer printing; or Silk screen printing,Woven on Custom Guitar Strap according to your logo, Length:150cm Wide:5cm, as your design for Custom Guitar Strap, Plastic hook,1-4 work days, according logo difference\r\n\r\n\r\n\r\n', 1.50),
(12, 'Ohuhu Legend of Zelda Ocarina 12 Hole Alto C with Textbook Display Stand Protective Bag\r\n', '12.jpg', 'This Ohuhu Handcrafted Ocarina is a high-quality, kiln-fired ceramic instrument tuned by professional. An easy-to-learn piece which can be mastered in a short period of time, with the ability to spend years.', 6.50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
