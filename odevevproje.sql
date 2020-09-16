-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Haz 2020, 18:43:25
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odevevproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencibilgileri`
--

CREATE TABLE `ogrencibilgileri` (
  `id` int(11) NOT NULL,
  `ogrenci_ad` text COLLATE utf8_bin NOT NULL,
  `ogrenci_soyad` text COLLATE utf8_bin NOT NULL,
  `veli_ad` text COLLATE utf8_bin NOT NULL,
  `veli_soyad` text COLLATE utf8_bin NOT NULL,
  `veli_tel` text COLLATE utf8_bin NOT NULL,
  `veli_mail` text COLLATE utf8_bin NOT NULL,
  `veli_tc` text COLLATE utf8_bin NOT NULL,
  `tarih` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `ogrencibilgileri`
--

INSERT INTO `ogrencibilgileri` (`id`, `ogrenci_ad`, `ogrenci_soyad`, `veli_ad`, `veli_soyad`, `veli_tel`, `veli_mail`, `veli_tc`, `tarih`) VALUES
(22, 'Anıl', 'Tapan', 'Ergin', 'Tapan', '05546322121', 'ergin@gmail.com', '22222222222', '2020-06-14 18:30:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `taksitler`
--

CREATE TABLE `taksitler` (
  `id` int(11) NOT NULL,
  `ogrenci_id` text COLLATE utf8_bin NOT NULL,
  `taksit_sira` text COLLATE utf8_bin NOT NULL,
  `taksit_tutar` text COLLATE utf8_bin NOT NULL,
  `taksit_tarih` text COLLATE utf8_bin NOT NULL,
  `durum` int(11) NOT NULL,
  `odenme_tarihi` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `taksitler`
--

INSERT INTO `taksitler` (`id`, `ogrenci_id`, `taksit_sira`, `taksit_tutar`, `taksit_tarih`, `durum`, `odenme_tarihi`) VALUES
(95, '22', '1', '500', '14-07-2020', 1, '14-06-2020'),
(96, '22', '2', '500', '14-08-2020', 0, ''),
(97, '22', '3', '500', '14-09-2020', 0, ''),
(98, '22', '4', '500', '14-10-2020', 0, '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrencibilgileri`
--
ALTER TABLE `ogrencibilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `taksitler`
--
ALTER TABLE `taksitler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrencibilgileri`
--
ALTER TABLE `ogrencibilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Tablo için AUTO_INCREMENT değeri `taksitler`
--
ALTER TABLE `taksitler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
