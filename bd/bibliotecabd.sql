-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 22:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`, `descricao`) VALUES
(1, 'Drama', '\r\nO gênero drama é uma forma artística que busca explorar as complexidades e emoções humanas por meio de narrativas envolventes e profundas. Geralmente centrado em conflitos emocionais, morais e sociais, o drama procura mergulhar nas experiências da vida real para examinar questões fundamentais da existência. Personagens bem desenvolvidos são colocados em situações desafiadoras, confrontados com dilemas significativos que exigem reflexão e autodescoberta.\r\n\r\nAs histórias de drama frequentemente abordam temas como amor, perda, redenção, traição, amizade e a luta contra adversidades. A intensidade emocional é uma característica marcante, com momentos de tensão, tristeza, alegria e conflito, proporcionando ao público uma experiência envolvente e reflexiva. O objetivo final do drama é provocar uma resposta emocional profunda e estimular a reflexão sobre as complexidades da condição humana.'),
(2, 'Romance', 'O gênero romance é uma expressão artística que mergulha nas nuances e emoções das relações humanas, destacando especialmente o desenvolvimento do amor entre personagens centrais. No cerne das histórias românticas, encontramos a jornada de descoberta, atração e conexão entre indivíduos, muitas vezes envolvidos em tramas repletas de paixão, ternura e desafios.\r\n\r\nEssas narrativas exploram o espectro completo do amor, desde o entusiasmo inicial e a euforia do enamoramento até os obstáculos que testam a força do vínculo entre os protagonistas. Os personagens em histórias de romance são frequentemente delineados com profundidade, permitindo ao público se identificar e se envolver emocionalmente com suas experiências.\r\n\r\nCenários românticos podem variar desde ambientes cotidianos até contextos épicos, proporcionando uma ampla gama de possibilidades narrativas. A busca pelo amor verdadeiro, a superação de desafios e a realização emocional são temas recorrentes que cativam o público, tornando o romance um gênero que celebra a beleza e a complexidade das relações interpessoais.'),
(3, 'Biografia', 'Uma biografia é um relato detalhado e autêntico da vida de uma pessoa, traçando sua jornada desde o nascimento até eventos significativos ao longo de sua existência. Este gênero literário busca oferecer uma visão abrangente e esclarecedora da personalidade, realizações, desafios e influências que moldaram a trajetória do indivíduo em foco.\r\n\r\nAs biografias geralmente começam com a infância e a formação inicial do protagonista, fornecendo contexto para compreender as experiências que contribuíram para seu desenvolvimento. Detalhes sobre relacionamentos, influências culturais, educacionais e profissionais são meticulosamente explorados para oferecer uma compreensão profunda do sujeito.\r\n\r\nAlém de narrar os eventos importantes, uma boa biografia também busca capturar a essência da personalidade do indivíduo, revelando características como motivações, desafios pessoais e evolução ao longo do tempo. O autor muitas vezes utiliza fontes primárias, entrevistas e pesquisa extensiva para garantir uma representação precisa e autêntica da vida do biografado.\r\n\r\nEm última análise, o propósito de uma biografia é proporcionar aos leitores uma experiência imersiva na vida de outra pessoa, inspirando, informando e oferecendo uma perspectiva única sobre a complexidade da condição humana.'),
(4, 'Fantasia', 'O gênero fantasia transporta os leitores para mundos extraordinários, onde a imaginação não conhece limites. Em meio a paisagens mágicas, seres sobrenaturais e poderes extraordinários, as histórias de fantasia oferecem uma fuga cativante do cotidiano. Elementos como magia, mitologia, criaturas místicas e aventuras épicas são características distintivas desse gênero envolvente.\r\n\r\nNos cenários fantasiosos, os escritores têm a liberdade de criar regras próprias para a realidade que concebem, muitas vezes explorando temas universais através de metáforas e simbolismos. Personagens heroicos, vilões formidáveis e destinos épicos são frequentemente entrelaçados em tramas complexas e cheias de reviravoltas.\r\n\r\nA jornada do herói é um tema recorrente na fantasia, onde personagens enfrentam desafios extraordinários, descobrem seus verdadeiros destinos e se tornam parte de algo maior do que eles mesmos. A magia, por sua vez, pode variar desde feitiçaria sutil até poderes cósmicos impressionantes, contribuindo para a criação de mundos ricos em detalhes e fascinantes em sua diversidade.\r\n\r\nA fantasia permite que os leitores explorem não apenas novas terras e culturas, mas também reflexões sobre questões fundamentais da existência, muitas vezes embaladas em alegorias e metáforas. Ao mergulhar em mundos imaginários, os leitores são convidados a suspender a realidade e acreditar, por um momento, que o impossível é possível.\r\n\r\n\r\n\r\n\r\n\r\n'),
(5, 'Ficção científica', 'A ficção científica é um gênero literário que mergulha nas possibilidades futuras, explorando avanços tecnológicos, mundos extraterrestres e questões científicas e éticas. Essas narrativas especulativas desafiam os limites da realidade conhecida, oferecendo vislumbres intrigantes do que o futuro pode reservar. Elementos de ciência, muitas vezes baseados em teorias científicas atuais ou futuras, são integrados à trama para criar um pano de fundo plausível e fascinante.\r\n\r\nAs histórias de ficção científica frequentemente exploram o impacto da tecnologia na sociedade, investigando as consequências éticas e sociais das inovações imaginárias. Viagens espaciais, inteligência artificial, realidades virtuais e distopias tecnológicas são temas comuns que permeiam o gênero, desafiando os leitores a considerar as implicações mais amplas das descobertas científicas.\r\n\r\nPersonagens em histórias de ficção científica muitas vezes lidam com dilemas éticos, confrontam desafios desconhecidos e questionam a natureza da existência em face de avanços extraordinários. A capacidade da ficção científica de misturar elementos científicos com especulações imaginativas permite a exploração de questões complexas, como a natureza da consciência, a busca por vida extraterrestre, as consequências do transumanismo e as possibilidades de manipulação genética.\r\n\r\nEm última análise, a ficção científica não apenas transporta os leitores para futuros distantes ou realidades alternativas, mas também oferece um espelho reflexivo para examinar o presente e antecipar as potenciais ramificações das inovações científicas e tecnológicas em nosso próprio mundo.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `numero_paginas` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `autor`, `numero_paginas`, `isbn`, `id_genero`) VALUES
(1, 'O Morro dos Ventos Uivantes', 'Emily Brontë', 416, '9780312096892', 1),
(2, 'Orgulho e Preconceito', 'Jane Austen', 424, '‎9788544001820', 2),
(3, 'Steve Jobs', 'Walter Isaacson', 656, '9781408703748', 3),
(4, 'A Sociedade do Anel', 'J. R. R. Tolkien', 468, '9789721041028', 4),
(5, 'Neuromancer', 'William Gibson', 320, '9780441000685', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
