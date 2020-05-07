-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 07:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `POST_ID` int(3) NOT NULL,
  `TITLE` char(100) DEFAULT NULL,
  `CONTENT` text DEFAULT NULL,
  `USER_ID` int(3) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`POST_ID`, `TITLE`, `CONTENT`, `USER_ID`, `DATE`) VALUES
(100, 'Computers', 'A computer is a machine that can be instructed to carry out sequences of arithmetic or logical operations automatically via computer programming. Modern computers have the ability to follow generalized sets of operations, called programs. These programs enable computers to perform an extremely wide range of tasks. A &quot;complete&quot; computer including the hardware, the operating system (main software), and peripheral equipment required and used for &quot;full&quot; operation can be referred to as a computer system. This term may as well be used for a group of computers that are connected and work together, in particular a computer network or computer cluster.\r\n\r\nComputers are used as control systems for a wide variety of industrial and consumer devices. This includes simple special purpose devices like microwave ovens and remote controls, factory devices such as industrial robots and computer-aided design, and also general purpose devices like personal computers and mobile devices such as smartphones. The Internet is run on computers and it connects hundreds of millions of other computers and their users.\r\n\r\nEarly computers were only conceived as calculating devices. Since ancient times, simple manual devices like the abacus aided people in doing calculations. Early in the Industrial Revolution, some mechanical devices were built to automate long tedious tasks, such as guiding patterns for looms. More sophisticated electrical machines did specialized analog calculations in the early 20th century. The first digital electronic calculating machines were developed during World War II. The first semiconductor transistors in the late 1940s were followed by the silicon-based MOSFET (MOS transistor) and monolithic integrated circuit (IC) chip technologies in the late 1950s, leading to the microprocessor and the microcomputer revolution in the 1970s. The speed, power and versatility of computers have been increasing dramatically ever since then, with MOS transistor counts increasing at a rapid pace (as predicted by Moore\'s law), leading to the Digital Revolution during the late 20th to early 21st centuries.\r\n\r\nConventionally, a modern computer consists of at least one processing element, typically a central processing unit (CPU) in the form of a metal-oxide-semiconductor (MOS) microprocessor, along with some type of computer memory, typically MOS semiconductor memory chips. The processing element carries out arithmetic and logical operations, and a sequencing and control unit can change the order of operations in response to stored information. Peripheral devices include input devices (keyboards, mice, joystick, etc.), output devices (monitor screens, printers, etc.), and input/output devices that perform both functions (e.g., the 2000s-era touchscreen). Peripheral devices allow information to be retrieved from an external source and they enable the result of operations to be saved and retrieved.', 100, '2020-05-02 14:00:43'),
(101, 'My Machine', 'A machine (or mechanical device) is a mechanical structure that uses power to apply forces and control movement to perform an intended action. Machines can be driven by animals and people, by natural forces such as wind and water, and by chemical, thermal, or electrical power, and include a system of mechanisms that shape the actuator input to achieve a specific application of output forces and movement. They can also include computers and sensors that monitor performance and plan movement, often called mechanical systems Renaissance natural philosophers identified six simple machines which were the elementary devices that put a load into motion, and calculated the ratio of output force to input force, known today as mechanical advantage.[1] Modern machines are complex systems that consist of structural elements, mechanisms and control components and include interfaces for convenient use. Examples include a wide range of vehicles, such as automobiles, boats and airplanes, appliances in the home and office, including computers, building air handling and water handling systems, as well as farm machinery, machine tools and factory automation systems and robots.', 100, '2020-05-02 13:09:27'),
(102, 'Pop Corn', 'Popcorn (popped corn, popcorns or pop-corn) is a variety of corn kernel which expands and puffs up when heated; the same names are also used to refer to the foodstuff produced by the expansion.\r\n\r\nA popcorn kernel\'s strong hull contains the seed\'s hard, starchy shell endosperm with 14–20% moisture, which turns to steam as the kernel is heated. Pressure from the steam continues to build until the hull ruptures, allowing the kernel to forcefully expand, from 20 to 50 times its original size, and then cool.[1]\r\n\r\nSome strains of corn (taxonomized as Zea mays) are cultivated specifically as popping corns. The Zea mays variety everta, a special kind of flint corn, is the most common of these.\r\n\r\nPopcorn is one of the six major types of corn, which includes dent corn, flint corn, pod corn, flour corn, and sweet corn.', 100, '2020-05-02 13:50:49'),
(103, 'Film', 'Film, also called movie or motion picture, is a visual art-form used to simulate experiences that communicate ideas, stories, perceptions, feelings, beauty or atmosphere, by the means of recorded or programmed[vague] moving images, along with sound (and more rarely) other sensory stimulations.[1] The word cinema, short for cinematography, is often used to refer to filmmaking and the film industry, and to the art form that is the result of it.\r\n\r\nThe moving images of a film are created by photographing actual scenes with a motion-picture camera, by photographing drawings or miniature models using traditional animation techniques, by means of CGI and computer animation, or by a combination of some or all of these techniques, and other visual effects.', 100, '2020-05-02 13:52:05'),
(104, 'Fishing', 'Fishing is the activity of trying to catch fish. Fish are normally caught in the wild. Techniques for catching fish include hand gathering, spearing, netting, angling and trapping. “Fishing” may include catching aquatic animals other than fish, such as molluscs, cephalopods, crustaceans, and echinoderms. The term is not normally applied to catching farmed fish, or to aquatic mammals, such as whales where the term whaling is more appropriate. In addition to being caught to be eaten, fish are caught as recreational pastimes. Fishing tournaments are held, and caught fish are sometimes kept as preserved or living trophies. When bioblitzes occur, fish are typically caught, identified, and then released.', 100, '2020-05-02 13:52:39'),
(105, 'Drawing', 'Drawing is a form of visual art in which a person uses various drawing instruments to mark paper or another two-dimensional medium. Instruments include graphite pencils, pen and ink, various kinds of paints, inked brushes, colored pencils, crayons, charcoal, chalk, pastels, various kinds of erasers, markers, styluses, and various metals (such as silverpoint). Digital drawing is the act of using a computer to draw. Common methods of digital drawing include a stylus or finger on a touchscreen device, stylus- or finger-to-touchpad, or in some cases, a mouse. There are many digital art programs and devices.', 100, '2020-05-02 13:53:57'),
(106, 'Testing', 'hello world', 100, '2020-05-07 12:23:44'),
(128, 'Elephants', 'Elephants are mammals of the family Elephantidae and the largest existing land animals. Three species are currently recognised: the African bush elephant, the African forest elephant, and the Asian elephant. Elephantidae is the only surviving family of the order Proboscidea; extinct members include the mastodons. The family Elephantidae also contains several now-extinct groups, including the mammoths and straight-tusked elephants. African elephants have larger ears and concave backs, whereas Asian elephants have smaller ears, and convex or level backs. Distinctive features of all elephants include a long trunk, tusks, large ear flaps, massive legs, and tough but sensitive skin. The trunk, also called a proboscis, is used for breathing, bringing food and water to the mouth, and grasping objects. Tusks, which are derived from the incisor teeth, serve both as weapons and as tools for moving objects and digging. The large ear flaps assist in maintaining a constant body temperature as well as in communication. The pillar-like legs carry their great weight.', 100, '2020-05-07 13:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(3) NOT NULL,
  `NAME` char(35) NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `NAME`, `EMAIL`, `PASSWORD`) VALUES
(100, 'John Doe', 'john.doe@gmail.com', '$2y$10$Up49KcKn5aElbyfYKprYcOS6xLS7rryDyzOXbR3xjQ/0ojjvU013.'),
(101, 'Ramiz', 'ramiz@gmail.com', '$2y$10$/N7Phfi8zCLbU3MgaEiWQuISAyxDhcwjJrK7eL7uQRL3FPeFNrr7K'),
(102, 'Bob', 'bob@gmail.com', '$2y$10$q6Whia2u6SZMvsj07h2E6.d9Pin4keG/Y1DOSG0y8PFh0i.PecCP2'),
(103, 'Daniel C', 'daniel@gmail.com', '$2y$10$RrihObKmbYluyuP6B5EopeuSLAybV0YdslacuNd73PL3arsfK7scK'),
(104, 'Tim', 'tim@gmail.com', '$2y$10$JeadtQVoAPTHcRyEyu.sIeHCkR77bx5OZPKzBGHt2mBQZkqz6tWYW'),
(105, 'Sam', 'sam@gmail.com', '$2y$10$c1.C7EFOknAXgxUKqgiqeObYjKHGdybl8s7o2o1OFerZ.R72l/N9C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`POST_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `POST_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
