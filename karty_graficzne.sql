-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Cze 2021, 09:47
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `karty_graficzne`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `img` text COLLATE utf8_polish_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kategoria` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `img`, `cena`, `kategoria`) VALUES
(69, 'AMD RX 5700XT', 'Nie pozwól, aby kompromisy ograniczały przyjemność płynącą z rozgrywki. Dzięki karcie graficznej Gigabyte Radeon RX 5700 XT Gaming OC zwyciężysz każdą potyczkę, jednocześnie podziwiając grafikę na najwyższych detalach. Nowatorska architektura AMD RDNA, interfejs PCI-E 4.0 oraz zaawansowane biblioteki graficzne pozwolą Ci pozwać zupełnie nową jakość gamingu. A dzięki RGB Fusion 2.0 możesz zmienić podświetlenie loga Gigabyte na obudowie karty.', 'img/amd1.jpg', '5699.00', 'amd'),
(70, 'AMD RX 5600XT', 'Nowatorska architektura AMD RDNA, interfejs PCI-E 4.0 oraz zaawansowane biblioteki graficzne pozwolą Ci pozwać zupełnie nową jakość gamingu. Karta graficzna Gigabyte Radeon RX 5600 XT GAMING OC wygeneruje płynną i doskonale prezentującą się grafiką, pozwalając przy tym skorzystać z wyjątkowych technologii, takich jak FreeSync. A dzięki RGB Fusion 2.0 możesz zmienić podświetlenie loga Gigabyte na obudowie karty.', 'img/amd2.jpg', '2999.00', 'amd'),
(71, 'AMD RX 5500XT', 'Wydajny, przystępny i bezkompromisowy - taki jest nowy układ AMD Radeon RX 5500 XT, wykonany w architekturze RDNA. Dzięki temu karta graficzna Gigabyte Radeon RX 5500 XT OC zapewnia bardzo dobrą wydajność w grach, tym bardziej że oferuje 8GB pamięci GDDR6 oraz nowy interfejs PCI-E 4.0. O stabilną pracę zadba układ chłodzenia WINDFORCE 2X, a wyjątkowy design nada wnętrzu komputera gamingowego stylu.', 'img/amd3.jpg', '2199.00', 'amd'),
(72, 'AMD RX 6900XT', 'Wyciśnij maksimum mocy architektury AMD RDNA 2 z układem graficznym RX 6900 XT. To wyjątkowe GPU, wspomagane przez 16GB szybkiej pamięci GDDR6 oraz interfejs PCI-E 4.0 umieszczono w potężnej karcie Gigabyte Radeon RX 6900 XT. Dzięki temu doskonale odnajdzie się w każdym gamingowym komputerze, a także pozwoli Ci skorzystać unikalnych technologii AMD czy sprzętowego Ray Tracingu. Graj w 4K na najwyższych detalach, nie obawiając się spadków płynności.', 'img/amd4.jpg', '6599.00', 'amd'),
(73, 'AMD RX 6700XT', 'Kolejna generacja układów w architekturze AMD RDNA 2 zapewnia najlepsze wrażenia z gamingu w rozdzielczościach 1440p. Wyposażona 12GB pamięci GDDR6 karta graficzna ASRock Radeon RX 6700 XT to wydajne rozwiązanie oferujące szereg graficznych technologii od AMD oraz wsparcie dla sprzętowego Ray Tracingu. Stabilną pracę całego układu gwarantuje wydajny układ chłodzenia, zamknięty w stylowej obudowie.', 'img/amd5.jpg', '6599.00', 'amd'),
(74, 'Nvidia RTX 3090', 'GeForce RTX™ 3090 to przepotężna karta graficzna (BFGPU) o wydajności klasy TITAN. Napędzana jest architekturą Ampere – drugą generacją układów RTX NVIDIA – podwajającą wydajność technik ray tracingu i SI dzięki wykorzystaniu udoskonalonych rdzeni RT, rdzeni Tensor oraz nowych multiprocesorów strumieniowych. Co więcej, wyposażono ją w oszałamiające 24 GB pamięci G6X, aby zapewnić absolutnie najlepszy komfort gamingu.', 'img/nvidia1.jpg', '13999.00', 'nvidia'),
(75, 'Nvidia RTX 3080', 'Karta GeForce RTX™ 3080 zapewnia ultrawydajność, jakiej pragną gracze, napędzaną architekturą Ampere – drugą generacją układów NVIDIA RTX. Zbudowano ją w oparciu o udoskonalone rdzenie RT i rdzenie Tensor, nowe multiprocesory strumieniowe i superszybką pamięć G6X, aby zapewnić niesamowity komfort gamingu.', 'img/nvidia2.jpg', '8690.00', 'nvidia'),
(76, 'Nvidia RTX 3070', 'Karta graficzna GeForce RTX™ 3070 oparta jest na architekturze Ampere – drugiej generacji układów RTX NVIDIA. Zbudowano ją w oparciu o udoskonalone rdzenie RT i rdzenie Tensor, nowe multiprocesory strumieniowe i szybką pamięć G6, aby zapewnić Ci moc obliczeniową potrzebną w najbardziej wymagających grach.', 'img/nvidia3.jpg', '5999.00', 'nvidia'),
(77, 'Nvidia RTX 3060TI', 'Karty GeForce RTX™ 3060 Ti oraz RTX 3060 pozwalają na rozgrywkę w najnowszych grach, korzystając z potęgi Ampere – drugiej generacji architektury RTX NVIDIA. Zyskaj niesamowitą wydajność dzięki udoskonalonym rdzeniom RT, odpowiadającym za ray tracing, oraz rdzeniom Tensor, nowym multiprocesorom strumieniowym i szybkiej pamięci G6.', 'img/nvidia4.jpg', '4499.00', 'nvidia'),
(78, 'Nvidia RTX 3060', 'Karty GeForce RTX™ 3060 Ti oraz RTX 3060 pozwalają na rozgrywkę w najnowszych grach, korzystając z potęgi Ampere – drugiej generacji architektury RTX NVIDIA. Zyskaj niesamowitą wydajność dzięki udoskonalonym rdzeniom RT, odpowiadającym za ray tracing, oraz rdzeniom Tensor, nowym multiprocesorom strumieniowym i szybkiej pamięci G6', 'img/nvidia5.jpg', '3599.00', 'nvidia'),
(79, 'Intel HD Graphics 650', 'jej premiera miała miejsce na początku 2017 roku. Należy podkreślić, że współpracuje ona z 4 różnymi procesorami, należącymi do serii Kaby Lake. Są to układy Intel Core i3-7167U, i5-7267U, i5-7287U oraz i7-7567U. Wyróżniają się one nieco wyższą częstotliwością taktowania w porównaniu z typowymi procesorami niskonapięciowymi, dlatego pozwalają na obsługę szczególnie wymagających programów projektowych, a także do obróbki wideo, dźwięku lub grafiki', 'img/intel1.jpg', '600.00', 'intel'),
(80, 'Intel HD Graphics 580', 'Intel początek sprzedaży Iris Pro Graphics 580 1 września 2015. Jest to karta graficzna do laptopów oparta na architekturze Gen. 9 Skylake i procesie technologicznym 14 nm, skierowana głównie do graczy.', 'img/intel2.jpg', '500.00', 'intel'),
(81, 'AMD RX 5700XT', 'Nie pozwól, aby kompromisy ograniczały przyjemność płynącą z rozgrywki. Dzięki karcie graficznej Radeon RX 5700 XT Gaming OC zwyciężysz każdą potyczkę, jednocześnie podziwiając grafikę na najwyższych detalach. Nowatorska architektura AMD RDNA, interfejs PCI-E 4.0 oraz zaawansowane biblioteki graficzne pozwolą Ci pozwać zupełnie nową jakość gamingu. A dzięki RGB Fusion 2.0 możesz zmienić podświetlenie loga na obudowie karty.', 'img/amd6.jpg', '5699.00', 'amd'),
(82, 'AMD RX 5600XT', 'Zaawansowany układ RX 5600 XT oraz 6GB pamięci GDDR6 zapewnią Ci płynną rozgrywkę w niemal każdych tytułach. Wyposażona w wytrzymałe komponenty i oferująca wyjątkowe osiągi karta Radeon RX 5600 XT PULSE pozwoli Ci wycisnąć maksimum z nowej architektury AMD RDNA i interfejsu PCI-E 4.0. Korzystaj z unikalnych technologii, takich jak Radeon Anti-Lag, FidelityFX czy FreeSync™ 2 HDR, a przy tym ciesz się stylowym designem karty uzupełnionym przez eleganki backplate.z podświetlanym logo.', 'img/amd7.jpg', '2199.00', 'amd'),
(83, 'AMD RX 5500XT', 'Wydajny, przystępny i bezkompromisowy - taki jest nowy układ AMD Radeon RX 5500 XT, wykonany w architekturze RDNA. Dzięki temu karta graficzna Radeon RX 5500 XT OC zapewnia bardzo dobrą wydajność w grach, tym bardziej że oferuje 8GB pamięci GDDR6 oraz nowy interfejs PCI-E 4.0. O stabilną pracę zadba układ chłodzenia WINDFORCE 2X, a wyjątkowy design nada wnętrzu komputera gamingowego stylu.', 'img/amd8.jpg', '1999.00', 'amd'),
(84, 'AMD RX 580', 'Znudziła Ci się gra na niskich ustawieniach? Wymień kartę graficzną na Radeon RX 580 GAMING. 8GB pamięci video i architektura GPU Polaris, gwarantują płynna rozgrywkę z najnowszymi tytułami, z wykorzystaniem ultrawysokiej rozdzielczości oraz gogli VR. W najgorętszych momentach możesz liczyć na wsparcie układu chłodzenia Windforce 2X Cooling System, który znakomicie rozprasza ciepło.', 'img/amd9.jpg', '1999.00', 'amd'),
(85, 'AMD RX 570', 'Radeon RX 570 GAMING zapewnia płynną rozrywkę na maksymalnych ustawieniach i w rozdzielczości Full HD. Bezbłędną obsługę gier, połączoną ze znakomitą sprawnością energetyczną, gwarantuje architektura GPU Polaris. RX 570 GAMING daje się też podkręcać, dzięki czemu uzyskasz jeszcze więcej mocy do e-sportowych zmagań.', 'img/amd10.jpg', '1699.00', 'amd'),
(86, 'Nvidia RTX 2080TI', 'Wejdź w nowy wymiar rozgrywki z GeForce RTX 2080 Ti GAMING X TRIO 11 GB. Poczuj nawet 6-krotny wzrost wydajności względem poprzedniej generacji kart graficznych. Dzięki technologii ray tracing oraz nowoczesnym systemom SI gry wejdą na zupełnie nowy poziom realizmu', 'img/nvidia6.jpg', '5899.00', 'nvidia'),
(87, 'Nvidia RTX 2080', 'GeForce RTX 2080 GAMING X TRIO 8 GB wprowadzi Cię w zupełnie nowy wymiar gamingu. Karta graficzna przy wsparciu NVIDIA Turing, technologii ray tracing i imponująco szybkiej pamięci GDDR6 sprawia, że oglądany świat gry staje się zaskakująco rzeczywisty. Imponujące detale w wysokiej rozdzielczości zapewniają niezapomniane doznania. Wysoka wydajność generacji RTX 2080 gwarantuje płynne wyświetlanie klatek. Kinowa jakość wkracza właśnie do gier.', 'img/nvidia7.jpg', '3599.00', 'nvidia'),
(88, 'Nvidia RTX 2070', 'Rewolucja w gamingu trwa. Dołącz do niej z kartą graficzną GeForce RTX 2070 Armor 8 GB. Potężną platformą zbudowaną w oparciu o architekturę NVIDIA Turing, gotową do starcia z każdą grą AAA. Potężny GPU wspiera pakiet inteligentnych technologii gamingowych NVIDIA, w tym nowatorski ray tracing. Dynamikę oraz realizm rozgrywki potęgują ponadto biblioteki DirectX 12.', 'img/nvidia8.jpg', '2999.00', 'nvidia'),
(89, 'Nvidia GTX 1660', 'Karta GeForce GTX 1660 OC oferuje w najnowszych grach wydajność porównywalną z osiągami modelu GeForce GTX 1070. Dzięki wykorzystaniu nowoczesnej architektury NVIDIA Turing możesz cieszyć się wyjątkowo płynną rozgrywką, o której stabilność zadba wyjątkowo efektywny układ chłodzenia Windforce 2X. Zyskujesz też gwarancję długiej niezawodności, gdyż kartę zbudowano w oparciu o najwyższej jakości komponenty oraz zabezpieczono stylowym backplatem.', 'img/nvidia9.jpg', '2499.00', 'nvidia'),
(90, 'Nvidia GTX 1650', 'Stwórz przystępny komputer do gier lub domowe centrum multimedialne, wykorzystując architekturę NVIDIA Turing, 4GB pamięci RAM GDDR5 oraz 128-bitową szynę pamięci. To właśnie oferuje karta graficzna GTX 1650 OC, która cechuje się wyjątkową jakością firmy i fabrycznie podkręconym taktowaniem. Jej wydajny układ chłodzenia zadba o utrzymanie optymalnych temperatur karty, również wyłączając się całkowicie, gdy te spadną poniżej określonego poziomu.', 'img/nvidia10.jpg', '1469.00', 'nvidia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`) VALUES
(12, 'admin', '$2y$10$hUKAEhc/H4zaqZEkVXLRkeQOMxMsI5SKY/mlNk5Efu2s3soPfMs0K', 'admin@local.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
