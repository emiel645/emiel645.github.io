-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 jun 2025 om 15:14
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hobbys`
--

CREATE TABLE `hobbys` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `beschrijving` text DEFAULT NULL,
  `afbeelding_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `hobbys`
--

INSERT INTO `hobbys` (`id`, `naam`, `beschrijving`, `afbeelding_url`) VALUES
(1, 'Voetbal', 'Voetbal vind ik echt geweldig om te spelen en te kijken. Mijn beste herinering aan een wedstrijd was tegn lsvv al verloren wij werden we gedegradeerd en als we wonnen bleven we zo hoog en lsvv stond boven aan. Het was 1-1 toen ik naar beneden werdt gehaald en ik weet niet wast er gebeurde was maar er veranderede wat en ik was niet te stoppen had oneindige energie won elk duel kwam zelfs een aantal keer bijna tot scoren toe,  toen stonden we 2-1 voor vol op de verdedeging en we hebben de wedstrijd uitgespeeld met een 3-1 winst en die  voelde echt geweldig. Nu speel ik in kaagvogels 2 heb ik net een vrij slecht seizoen achter de rug (voor mijn zelf voor et team is dit normaal ) maar ik speel elke wedstrijd nogsteeds met heel veel plezier.', 'voetbal.jpg'),
(2, 'mappen maken', 'Ik heb het altijd al leuk gevonden om kaarten te bestuderen. Op de basisschool keek ik vaak in de atlassen als ik me verveelde. Elke serie die ik kijk met een verhaallijn en een andere wereld waarin het zich afspeelt, maakt me nieuwsgierig naar de kaart ervan. Daarom maak ik ook mijn eigen kaarten, zodat ik al mijn ideeën erin kan verwerken. Voor de kaart waar ik nu mee bezig ben, wil ik ook een verhaal maken met gebeurtenissen en uitleg over de verschillende gebieden.', 'mapmaking.png'),
(3, 'vivarium design', 'Ik ben een tijdje geleden in vivaria geïnteresseerd geraakt, omdat ik vroeger misschien in een dierentuin wilde werken – het liefst bij de reptielen. Uiteindelijk heb ik besloten om dat eerder als hobby te doen. Nu wil ik graag een schildpad als huisdier, het liefst een landschildpad zoals de vierteenschildpad. Alleen is het best duur om er een aan te schaffen en goed te verzorgen. Maar zodra ik me weer comfortabel voel om wat meer geld uit te geven, ga ik ervoor.\r\n\r\nMijn grootste droom is om iets te hebben zoals AntsCanada: vier grote vivaria die allemaal met elkaar verbonden zijn.', 'vivarium.png'),
(4, 'pokemon kaarten', 'Dit jaar ben ik weer begonnen met Pokémon-kaarten verzamelen. Elke maand koop ik een paar kaarten. De kaart die je nu ziet, is mijn favoriete kaart die ik ooit hoop te krijgen. Hij is alleen heel duur, ongeveer 295 euro. Maar ja, ik blijf gewoon pakjes kopen en hopen dat ik hem uiteindelijk krijg!', 'pokemon.png'),
(5, 'progameren', 'Met programmeren ben ik pas begonnen sinds deze opleiding, en ik vind het eigenlijk best leuk. Ik begon ermee omdat ik het interessant vond, maar nu vind ik het ook echt leuk om te doen. Het leukste om te bestuderen vind ik AI en bots, omdat dat nog relatief nieuw is en nu al zo ver ontwikkeld is. Dan denk je toch: wat is het volgende waar het toe in staat zal zijn?\r\n\r\nOp dit moment experimenteer ik veel met image generation: hoe reageert de AI op welke prompt, en hoe krijg je het beste resultaat? Deze zomer wil ik zelfs mijn eigen AI gaan maken, maar ik weet nog niet precies wat die AI gaat doen.', 'progameren.png'),
(6, 'gamen', 'Met gamen ben ik al sinds kinds af aan bezig. Het is ook een manier waarop ik veel connect met vrienden. Vooral strategie spellen vind ik leuk, waarbij je bijvoorbeeld een land het grootst en sterkst maakt, of een eigen deck samenstelt en hoopt dat het werkt. Soms speel ik ook shooters, maar die vind ik minder leuk en ik ben er niet zo goed in. Het spel waarin ik mezelf het beste vind, is Clash Royale, met mijn Miner-Poison deck.', 'eu4.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reaction_times`
--

CREATE TABLE `reaction_times` (
  `user_id` int(11) NOT NULL,
  `time_ms` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reaction_times`
--

INSERT INTO `reaction_times` (`user_id`, `time_ms`, `updated_at`) VALUES
(1, 289, '2025-05-31 16:28:16'),
(2, 360, '2025-06-01 12:52:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'we', '$2y$10$GT82j..97xJ3Q5hbktXkS.GngLzg4hPiycXWOd12NGsNYGFC9UFd6'),
(2, 'wer', '$2y$10$zauS7UOABTtBTbfZEEqe/.Wpb6/bv4N9P7FYEZTDD.bTg.exDRwBq');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `hobbys`
--
ALTER TABLE `hobbys`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reaction_times`
--
ALTER TABLE `reaction_times`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `hobbys`
--
ALTER TABLE `hobbys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reaction_times`
--
ALTER TABLE `reaction_times`
  ADD CONSTRAINT `reaction_times_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
