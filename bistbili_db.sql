-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 19 Haz 2024, 14:43:26
-- Sunucu sürümü: 5.7.44
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bistbili_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `role` varchar(9) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `isim`, `adsoyad`, `sifre`, `role`) VALUES
(0, 'TrinsyCa', 'Ömer İslamoğlu', '@x@o_zIs@x%5W%$1406//@', 'rooter'),
(2, 'ilyilmaz', 'Yılmaz Ilışık', '9bozwibo', 'rooter');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(5) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `classes`
--

INSERT INTO `classes` (`id`, `class`) VALUES
(0, 'Mezun'),
(45, '12/B'),
(46, '12/AB'),
(47, '11/B'),
(62, '11/A'),
(63, '10/A'),
(64, '10/B');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` text COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(14) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `tel`, `message`, `tarih`) VALUES
(1, 'Ömer İslamoğlu', 'omerislamoglu1905@gmail.com', '(539) 615-9353', 'Deneme Mesajı', '2023-07-19 17:28:32'),
(2, 'Will', 'will.adolfo@gmail.com', '021 882 70 37', 'Are you the owner of this site: http://bistbilisim.com? I am happy to inform you that you have been approved to place your submission to our free directory. Please go ahead and submit it by clicking on this link: http://submityoursitefree.12com.xyz/', '2023-07-19 17:28:32'),
(3, 'Upshaw', 'alisha.upshaw@gmail.com', '407-337-4545', 'I am pleased to inform you that you can now submit your site to our business directory for free. Visit: http://submityoursitefree.12com.xyz/', '2023-07-30 02:03:04'),
(4, 'Suttor', 'marita.suttor@gmail.com', '0490 36 68 11', 'Quick question to ask you...\r\n \r\nAre you aware that in 2023, email marketing still works? \r\nThe fact that you are reading these lines is proof of that.\r\n\r\nEmail marketing is underrated, and yet it works so well.  \r\nAll you have to do is find some emails, send a message and cash in.\r\n\r\nFor example, to find emails you can use this service: https://garymarketing.com/go/scrap-gmap\r\n\r\nIt extracts emails, phone numbers, and lots of other information from Google Map listings.\r\n\r\nOf course, there are plenty of other ways to get in touch with your ideal customers.\r\nContact me on Skype and let\'s discuss what will work for your product/service. \r\n- My Skype ID: live:.cid.6b79b1d5a11a2ec7\r\n- My Blog : garymarketing.com\r\n\r\n\r\nRegards,\r\nGary &amp; Ophélie\r\n\r\n\r\n\r\n------ \r\n\r\nJ\'ai une petite question à vous poser...\r\n\r\nSavez-vous qu\'en 2023, l\'email marketing fonctionne toujours très bien ? \r\nLa preuve, vous lisez ces lignes.\r\n\r\nL\'email marketing est clairement sous-couté,\r\nIl  suffit de trouver les coordonnées de vos clients idéaux, d\'entrer en contact, et d\'encaisser.\r\n\r\nPour trouver les coordonnées d\'entreprise, vous pouvez par exemple utiliser ce service : scrapmybusiness.com\r\nIl permet d\'extraire les emails, les numéros de téléphone et de nombreuses autres informations a partir des fiches entreprises de Google Map.\r\n\r\nBien sur il y\'a plein d\'autre solutions pour entrer en contact avec vos clients idéaux\r\n\r\nAjouter moi sur Skype et discutons de ce qui conviendrait le plus pour promouvoir votre produit/service.\r\n- Identifiant Skype: live:.cid.83c9da999a4f9f\r\n- Mon Blog : http://garymarketing.com\r\n\r\nCordialement,\r\nOphélie et Gary.', '2023-08-03 19:45:59'),
(5, 'Kara', 'canfield.alphonse47@gmail.com', '(02) 4264 7220', 'Merhaba,\r\n\r\nWebsitenizin içeriğini daha iyi geliştirebilmeniz için yapay zekayı kullanabilirsiniz, fakat CHATGTP\'den bahsetmiyorum,\r\n\r\nNe yazık ki Chatgpt insan doğrulamasını geçemiyor, buradan kontrol edebilirsin &gt;&gt; https://contentatscale.ai/ai-content-detector/\r\n\r\nDaha iyi içerikler için, yine yukarıdaki linki inceleyebilirsin..\r\n\r\nve Farklı bir konu hakkındada konusmak istiyorum sizinle,\r\n\r\nElimde piyasanın en güvenilir casino websitelerinden birinin %200 para yatırma bonus kodum var.\r\n\r\nBu kod ile yeni üyeler yararlanabiliyor, ve ben sitenizde bunun için post paylaşmanın maliyetini almak istiyorum, tabi mümkünse :)\r\n\r\nWebsite linki: https://t.ly/3Tvy9\r\nÜye olurken girilecek promosyon kodu: &quot;SEN200&quot;\r\n\r\nSweet Bonanza gibi harika slot oyunları var websitesinde, böyle bir makalem hazır. İsterseniz siz de bonus kodu ile üyelik açabilirsiniz limit bitmeden :)\r\n\r\nGörüşmek üzere,\r\nAhmet Karacasu', '2023-09-10 00:50:10'),
(6, 'Zielinski', 'juanita.zielinski@gmail.com', '(08) 8326 2219', 'Is this your website? bistbilisim.com? I just sent you a message via the contact form on your site and was wondering if you wanted to try some unique advertising that reaches business owners worldwide? How do we do it? Well you just witnessed our process. We send your ad text to contact forms on websites worldwide. Plans start at a hundred dollars for posting your ad to one million sites. Reach out to me via Skype and let\'s dicuss what we can do for your business. My Skype id is:  live:.cid.aebc78a94c13344c', '2023-09-12 20:08:02'),
(7, 'RaymondTor', 'no.reply.ArneOlsson@gmail.com', '82378799681', 'Good morning! bistbilisim.com \r\n \r\nDid you know that it is possible to send letter wholly legitimately? We proffer a new legitimate way of sending letter through contact forms. Such forms are available on numerous websites. \r\nWhen such requests are sent, no personal data is used and messages are securely routed to forms designed to receive them and any subsequent appeals. Communication Forms help to ensure that messages sent through them are not treated as spam, as they are seen as important. \r\nTry our service out – it’s free of charge! \r\nWe shall forward up to 50,000 messages for you. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis letter is automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.', '2023-09-16 00:22:12'),
(8, 'Pawsey', 'pawsey.maura@yahoo.com', '027 325 29 78', 'I have a question. You just read this message right? That means you\'re now a potential customer and I can do the same thing for your business. I can blast YOUR ad to 1 million websites just like I did to yours for just $98. More pricing plans are also available, contact me via Skype for details: live:.cid.dd8a3501619891fe', '2023-09-19 15:22:02'),
(9, 'RaymondTor', 'no.reply.StianGoossens@gmail.com', '86813141444', 'Salutations! bistbilisim.com \r\n \r\nDid you know that it is possible to send request completely in lawful manner? We offer a unique approach to sending messages through contact forms. Many websites offer such forms. \r\nWhen such messages are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals securely. As Communication Forms are seen as important, messages sent through them are unlikely to be marked as spam. \r\nThere is now no cost to you to try out our service. \r\nWe can send up to 50,000 messages on your instruction. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis message was automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.', '2023-09-20 23:38:29'),
(10, 'Peter', 'leon.peter@gmail.com', '61-38-33-36', 'I just left you this message on your website contact form at bistbilisim.com and I have also sent it to millions of other sites. I get new customers every day using this method and so can you! For just under a hundred bucks you can reach 1 million websites! For more info and pricing, just reach out to me via Skype here: live:.cid.dd8a3501619891fe', '2023-09-28 02:52:49'),
(11, 'Eric Piet', 'inficzateam@gmail.com', '86197733145', 'We are delighted to offer our vast international network of potential funding partners to cater to your needs. Whether you are currently engaged in a project or have a pre-existing venture requiring financial support, our team is ready to provide expert assistance. Our partners are equipped to invest in projects ranging from $1M to $3B, offering competitive interest rates of 2.5% to 4% over a 10-year term, complement by a generous 2-year grace period. \r\n \r\nShould you require more information, please don\'t hesitate to reach out to us. \r\n \r\nWarmest Regards \r\n \r\nEric Piet \r\nEric.Piet@inficza.com \r\nPortfolio Manager \r\nINFICZA \r\nhttp://www.inficza.com/', '2023-09-29 02:20:31'),
(12, 'Mike Shorter\r\n', 'mikeavaililkSib@gmail.com', '83881848245', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\n \r\nRegards \r\nMike Shorter\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2023-09-29 13:34:41'),
(13, 'Paling', 'nidia.paling@gmail.com', '040 75 30 42', 'I was sending you this message on your website contact page (bistbilisim.com) to show you how contact form advertising works. We can send messages just like these for your business to millions of sites for less than a couple of hundred dollars. Let\'s get the conversation started and I\'ll share pricing and more details. Hit me up on Skype for a chat now --&gt;  live:.cid.303294bd15a81bc7', '2023-10-05 19:02:47'),
(14, 'Mike Jerome\r\n', 'peterfamnirraw@gmail.com', '82384782352', 'Howdy \r\n \r\nI have just analyzed  bistbilisim.com for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Jerome\r\nDigital X SEO Experts', '2023-10-06 09:33:28'),
(15, 'Winstead', 'winstead.ashly@yahoo.com', '3420876038', 'Hi there,\r\nMonthly Seo Services - Professional/ Affordable Seo Services\r\nHire the leading seo marketing company and get your website ranked on search engines. Are you looking to rank your website on search engines? Contact us now to get started - https://digitalpromax.co/la/  Today!\r\n\r\nPsst.. we will also do web design and build complete website. Wordpress and Ecommerce sites development. Click here: https://wpexpertspro.co/website/', '2023-10-07 05:42:55'),
(16, 'Mike Abramson\r\n', 'mikefamnirraw@gmail.com', '83828757899', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nThanks and regards \r\nMike Abramson\r\n', '2023-10-07 07:10:36'),
(17, 'Williams', 'kassie.madison@hotmail.com', '414 8574', 'Hi, excellent business. You should benefit from using new multimedia clips at http://presentervisuals.com and grow your profits on video sites this week.', '2023-10-10 22:28:32'),
(18, 'Mike Hancock\r\n', 'mikeSeapows@gmail.com', '87484465157', 'Hi \r\n \r\nThis is Mike Hancock\r\n \r\nLet me present you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\n \r\nRegards \r\n \r\nMike Hancock\r\n \r\nmike@strictlydigital.net', '2023-10-11 14:08:05'),
(19, 'Mike Simpson\r\n', 'mikeroda@gmail.com', '81556152861', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Simpson\r\n \r\nMonkey Digital', '2023-10-11 14:35:40'),
(20, 'McCulloch', 'projectleadsblue@gmail.com', '0418-4559751', 'Want to start getting 10x  more customers today? Reach the exact customer inbox like I reached you and boost sales for your service or products, and I\'ll show you how it\'s done: Check out: https://leadsblue.net/    once to find more. We are offering an 80% discount today.', '2023-10-12 17:32:54'),
(21, 'Borowski', 'taj.borowski@yahoo.com', '078 7105 6622', 'Accidental overdose is the #1 cause of death for people aged 18-45 in the United States.\r\n\r\n \r\n\r\nNarcan is a nasal spray that can reverse an opioid overdose, saving the person’s life.  Our group of volunteers has compiled a website that tracks organizations that are giving out free and discount Narcan, this site is  https://www.narcan-finder.com/. \r\n\r\n \r\n\r\nEventually this life saving medication will be as easy to find as a fire extinguisher, but at the moment, it’s only gradually becoming available, and often expensive at drugstores, etc. Would you consider sharing our resource on your website?  It will save lives.\r\n\r\n \r\n\r\nIf you have any questions or want to help spread the word, contact us at narcanfinder@gmail.com. Thank you for your consideration!', '2023-10-15 17:10:48'),
(22, 'Mike Charlson\r\n', 'mikeAutollatuh@gmail.com', '81458316361', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Charlson\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2023-10-16 17:37:36'),
(23, 'Truax', 'truax.larhonda@gmail.com', '0317 4302102', 'Quick question to ask you...\r\n \r\nAre you aware that in 2023, email marketing still works? \r\nThe fact that you are reading these lines is proof of that.\r\n\r\nEmail marketing is underrated, and yet it works so well.  \r\nAll you have to do is find some emails, send a message and cash in.\r\n\r\nFor example, to find emails you can use this service: https://garymarketing.com/go/scrap-gmap\r\n\r\nIt extracts emails, phone numbers, and lots of other information from Google Map listings.\r\n\r\nOf course, there are plenty of other ways to get in touch with your ideal customers.\r\nContact me on Skype and let\'s discuss what will work for your product/service. \r\n- My Skype ID: live:.cid.6b79b1d5a11a2ec7\r\n- My Blog : garymarketing.com\r\n\r\n\r\nRegards,\r\nGary &amp; Ophélie\r\n\r\n\r\n\r\n------ \r\n\r\nJ\'ai une petite question à vous poser...\r\n\r\nSavez-vous qu\'en 2023, l\'email marketing fonctionne toujours très bien ? \r\nLa preuve, vous lisez ces lignes.\r\n\r\nL\'email marketing est clairement sous-couté,\r\nIl  suffit de trouver les coordonnées de vos clients idéaux, d\'entrer en contact, et d\'encaisser.\r\n\r\nPour trouver les coordonnées d\'entreprise, vous pouvez par exemple utiliser ce service : scrapmybusiness.com\r\nIl permet d\'extraire les emails, les numéros de téléphone et de nombreuses autres informations a partir des fiches entreprises de Google Map.\r\n\r\nBien sur il y\'a plein d\'autre solutions pour entrer en contact avec vos clients idéaux\r\n\r\nAjouter moi sur Skype et discutons de ce qui conviendrait le plus pour promouvoir votre produit/service.\r\n- Identifiant Skype: live:.cid.83c9da999a4f9f\r\n- Mon Blog : http://garymarketing.com\r\n\r\nCordialement,\r\nOphélie et Gary.', '2023-10-17 04:31:53'),
(24, 'Syed Atif', 'ujn2esbgakah@opayq.com', '83922976324', 'Hello, \r\n \r\nWe provide funding through our venture capital company to both start-up and existing companies either looking for funding for expansion or to accelerate growth in their company. \r\nWe have a structured joint venture investment plan in which we are interested in an annual return on investment not more than 10% ROI. We are also currently structuring a convertible debt and loan financing of 3% interest repayable annually with no early repayment penalties. \r\n \r\nWe would like to review your business plan or executive summary to understand a much better idea of your business and what you are looking to do, this will assist in determining the best possible investment structure we can pursue and discuss more extensively. \r\n \r\n \r\nI hope to hear back from you soon. \r\n \r\nSincerely, \r\n \r\nSyed Atif \r\nInvestment Director \r\nDevcorp International E.C. \r\nP.O Box 10236 Shop No. 305 \r\nFlr 3 Manama Centre, Bahrain \r\nEmail: syed.atif@devcorpinternational.com', '2023-10-24 15:55:34'),
(25, 'Mike Lamberts\r\n', 'mikeavaililkSib@gmail.com', '88483327834', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\n \r\nRegards \r\nMike Lamberts\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2023-10-24 18:19:35'),
(26, 'McLeod', 'mcleod.alysa@outlook.com', '0506-2315671', 'Everyone knows the secret to successful advertising is getting LOTS of people to read your ad. That\'s exactly what I\'m doing now. Just like I posted this message to your website, I can do the same thing for you! I have millions of websites that I can post your ad to. Pricing starts at just $100 to reach a million sites! Skype me today: contactformmarketing2023', '2023-10-26 03:15:44'),
(27, 'Daniel', 'support@newlightdigital.com.hubspot-inbox.com', '81432591712', 'Hello, \r\n \r\nWe are offering a discount on all our digital marketing services. If you were ever thinking about doing stuff like this, now is the time. This is an amazing deal. Just pick one or more packages below. \r\n \r\n1. Write, optimize, and format 3 blog posts per month (1200 words) \r\n(Value: $1,350) - Now $800/month \r\n \r\n2. 20 hours of SEO per month \r\n(Value: $1,500) - Now $1,000/month \r\n \r\n3. Email marketing -- two emails per month to your list of prospects \r\n(Value $750) - Now $350/month \r\n \r\n4. Social media posting -- 12 posts per month on your social channels (FB + TW + LN) \r\n(Value $900) - Now $450/month \r\n \r\n5. All of the above -- for $2,340 \r\n \r\nThanks! \r\n \r\n \r\n \r\nDaniel \r\nPhone: +1 (586) 372-8384 \r\nWhatsapp: +3 (736) 009-2931 \r\nSkype: live:.cid.5f5cb3da17814a59 \r\nTelegram: awesomeagency', '2023-10-30 10:58:02'),
(28, 'TobiasProgs', 'no.reply.MichelMuller@gmail.com', '82917974443', 'What’s up? bistbilisim.com \r\n \r\nDid you know that it is possible to send message absolutely legally? We make available a new legal way of sending letters via feedback forms. You can find these feedback forms on a lot of sites. \r\nWhen such commercial offers are sent, no personal data is used and messages are sent to forms specifically designed to receive messages and appeals efficiently. Messages sent via Feedback Forms are unlikely to be viewed as spam, since they are seen as important. \r\nWe are offering you an opportunity to try our service without charge. \r\nWe can transmit up to 50,000 messages on your behalf. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis offer is automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp  +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\n \r\nWe only use chat for communication.', '2023-10-30 14:47:36'),
(29, 'Mike Oakman\r\n', 'mikefamnirraw@gmail.com', '82976999495', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nThanks and regards \r\nMike Oakman\r\n', '2023-10-30 19:22:29'),
(30, 'Mike Owen\r\n', 'peterfamnirraw@gmail.com', '82816314649', 'Hi \r\n \r\nI have just verified your SEO on  bistbilisim.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Owen\r\nDigital X SEO Experts', '2023-11-05 01:42:52'),
(31, 'Wrigley', 'wrigley.casie@msn.com', '03.08.28.21.70', 'Want to find out how to promote your site without paying for advertising? Check out: ivxxi.com', '2023-11-06 21:55:26'),
(32, 'Mike Macey\r\n', 'mikeroda@gmail.com', '82687488575', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Macey\r\n \r\nMonkey Digital', '2023-11-07 13:56:45'),
(33, 'Mike Pass\r\n', 'mikeSeapows@gmail.com', '86254281556', 'Greetings \r\n \r\nThis is Mike Pass\r\n \r\nLet me introduce to you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\n \r\nRegards \r\n \r\nMike Pass\r\n \r\nmike@strictlydigital.net', '2023-11-07 18:08:08'),
(34, 'Knisley', 'knisley.hildegarde7@outlook.com', '8922235423', 'Hi there!\r\nTop Rated SEO Agency. Personalized Service from Dedicated Account Team. ROI Driven. Relationship Focused. Custom SEO Strategy. 95% Client Retention Rate. Services: Analytics, Back-end Development, Competitive Research, Consulting.  Buy now: https://alwaysdigital.co/la/ \r\n\r\nPsst. If you have web development/ designing requirements, feel free to see more details at: https://outsource-bpo.com/website/\r\n', '2023-11-13 10:55:10'),
(35, 'Zepps', 'zepps.aretha@gmail.com', '(03) 6267 2352', 'Get more customers without spending a dime on advertising. Check Out http://Aretha.tg4.xyz', '2023-11-13 19:03:18'),
(36, 'Mike Hill\r\n', 'mikeAutollatuh@gmail.com', '86493253946', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Hill\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2023-11-19 02:37:28'),
(37, 'Gipps', 'kacey.gipps3@gmail.com', '6747318089', 'Is Your Search Console Reporting Errors? Don\'t let issues hold back your SEO! Specializing in fixing Search Console errors for higher rankings. Resolve crawl issues, improve indexing, and supercharge your SEO. Let\'s boost your site together! Visit now: https://speedexpert.co/search-console/\r\n\r\nWe also offer Web Designing Services:\r\n\r\n7 Pages Website, 2 Contact Forms, Responsive Design, Onsite SEO, Banner with Slideshow on Home Page, Professional and affordable website design - Starts $79 . More details: https://wpexpertspro.co/website/', '2023-11-22 11:57:07'),
(38, 'Commons', 'commons.bettina14@outlook.com', '0911 84 88 47', 'I have a method to get you more customers without you having to pay for advertising. Go to http://Bettina.tg4.xyz', '2023-11-23 06:17:46'),
(39, 'Mike Roberts\r\n', 'mikeavaililkSib@gmail.com', '82621973281', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\n \r\nRegards \r\nMike Roberts\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2023-11-25 15:47:32'),
(40, 'Greenfield', 'steve82991@gmail.com', '212-443-2134', ' am i ever going to get any support here? i\'m going to just file a chargeback if you can\'t get back to me... you guys are listed as support on this amazon listing https://amzn.to/46pmr71 - please get back to me asap... -Steve ', '2023-11-27 03:34:59'),
(41, 'Mike Kendal\r\n', 'mikefamnirraw@gmail.com', '81753613213', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nThanks and regards \r\nMike Kendal\r\n', '2023-11-28 00:47:26'),
(42, 'Mike Holiday\r\n', 'peterfamnirraw@gmail.com', '88786495764', 'Howdy \r\n \r\nI have just checked  bistbilisim.com for its SEO metrics and saw that your website could use an upgrade. \r\n \r\nWe will improve your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Holiday\r\nDigital X SEO Experts', '2023-11-28 22:25:10'),
(43, 'Nichols', 'antoinette.nichols77@msn.com', '3898191330', 'Is your website making the right first impression? In today\'s digital age, a well-designed website is essential for success.\r\n\r\nAt https://wpexpertspro.co/website/ , we specialize in crafting custom, user-friendly websites that captivate your audience. Here\'s why you should choose us:\r\n\r\nTailored Designs: Unique to your brand and goals.\r\nUser-Centric: Ensuring an enjoyable experience for your visitors.\r\nMobile Optimization: Seamless performance on all devices.\r\nSEO-Friendly: Enhancing visibility and rankings.\r\nTimely Delivery: Quality without compromise, on schedule.\r\n\r\nReady to elevate your online presence? Contact us at https://wpexpertspro.co/website/ to discuss your requirements.\r\n\r\nBest regards,\r\nSam', '2023-11-30 15:37:09'),
(44, 'Scarberry', 'clayton.scarberry@gmail.com', '01.59.64.58.63', 'Are you ready to ignite your online presence and enhance your business? Look no further! Our Premium Guest Posting Services are here to take your success to the next level.\r\n\r\nCheck it out: https://tinyurl.com/aicopify\r\n\r\nWe want to highlight some key advantages of our service that will leave you absolutely thrilled:\r\n\r\n- Top-notch Backlinks: With a staggering over 30,000 websites at your reach, you\'ll have access to top-tier backlinks that can dramatically boost your website\'s search engine placement. These are not just any backlinks – they\'re powerful endorsements from websites with genuine traffic and credibility.\r\n\r\n- No Payment Until You\'re Satisfied: We are so confident in our service that we offer a unique satisfaction guarantee. You only pay when you are completely satisfied with the results. Your peace of mind is our top priority, and we\'re here to deliver on our promises.\r\n\r\n- Boost Traffic, Generate Leads, and Skyrocket Sales: Placing your content on niche-specific, high-traffic websites is the golden ticket to reaching your ideal customers, attracting devoted customers, and catapulting your sales. It\'s a surefire way to make your business blossom.\r\n\r\n- Affordable Marketing Solution: Guest blogging is not only highly effective, but it\'s also budget-friendly. It\'s a cost-efficient alternative to traditional paid advertising methods. You\'ll save money while unleashing remarkable outcomes.\r\n\r\n- Rule the Search Results: Your website\'s ranking on Google will soar as you secure quality backlinks from reputable websites. Watch your website climb the SERP ladder and gain the visibility you\'ve always dreamed of.\r\n\r\nDon\'t miss out on this amazing chance to transform your online presence and enjoy all the advantages that come with it. Our Exclusive Guest Posting Opportunities will make your business shine, and the best part is, it starts at just $3.99! Take the first step towards your online triumph today!\r\n\r\nClick here: https://tinyurl.com/aicopify', '2023-12-02 08:37:54'),
(45, 'JamesDot', 'exchangeaibot@proton.me', '89966313674', 'Exchangeaibot - This is a new bot product for automated cryptocurrency trading based on artificial intelligence. Have you heard about crypto arbitrage? Let\'s give an example: you buy Bitcoin on the first exchange for $30,000, then find a second exchange where the Bitcoin rate is higher and sell it there for $32,000 and receive a percentage of the profit from the transaction. \r\n \r\nAre you ready to try a new way to make money on cryptocurrency without risk? Exchangeaibot is your personal crypto arbitrage bot. Get a free test signal and earn +15%! Trust our AI-powered tool to find great deals! \r\n \r\nOfficial project link: http://exchangeaibot.com', '2023-12-03 14:45:08'),
(46, 'Stewart', 'noreplyhere@aol.com', '342-123-4456', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at my email or skype below for details.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps3352@gomail2.xyz', '2023-12-03 17:08:42'),
(47, 'Mike Baker\r\n', 'mikeroda@gmail.com', '89479949264', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Baker\r\n \r\nMonkey Digital', '2023-12-04 17:35:49'),
(48, 'Michael', 'senaida.macleod@gmail.com', '51 122 56 22', 'Hi, \r\n\r\nI wanted to write because I follow you.\r\n\r\nI made a profit of 10 ETH last week, but users of  MEV bot have already earned an impressive 325k... \r\n\r\nMy ref link: https://cutt.ly/fwI0BCq7', '2023-12-05 00:49:41'),
(49, 'Wilba', 'wilbamark90@gmail.com', '09186 91 18 62', 'Hi, I have a ton of leads that want to pay for your products / services. When do you have a second to chat about them? Would you be willing to do a comission on the leads I send over? Please reply with your best phone number so that we can discuss. -Mark W.', '2023-12-06 17:28:20'),
(50, 'Miley', 'miley.darrel@gmail.com', '4533419873', 'Advantages of hiring a Developer:\r\n\r\nSpecialized Expertise\r\nTailored Customization and Control\r\nTime and Cost Efficiency\r\nCustom Plugin Development\r\nSEO Optimization\r\nOngoing Support and Maintenance\r\nSeamless Integration and Migration\r\nScalability for Business Growth\r\n\r\nHire a web developer now from us. Contact us at https://wpexpertspro.co/website/', '2023-12-07 20:21:05'),
(51, 'Mike Nyman\r\n', 'mikeSeapows@gmail.com', '89555946329', 'Hi \r\n \r\nThis is Mike Nyman\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\n \r\nRegards \r\n \r\nMike Nyman\r\n \r\nmike@strictlydigital.net', '2023-12-07 20:26:38'),
(52, 'Joanna Clements', 'notification@keywordmark.com', '(945)840-4275', 'Disclaimer: We are not liable for any monetary losses, information loss, reduction in search engine rankings, missed clients, undeliverable email or any other harm that you may incur upon the expiration of bistbilisim.com. For more information please refer to section 512.g.1a of our Terms and Conditions.\nHere is your ultimate alert to extend bistbilisim.com:\nhttps://keywordmark.com/?d=cG95aXBvYm95b2MucWVj\nIn the case that bistbilisim.com ceases, we maintain the authority to provide your position to rival businesses in the identical sector and region after 3 business days on an bidding basis.\nThis is the last message that we are obliged to send out concerning the termination of bistbilisim.com\nSafe Online Payment:\nhttps://keywordmark.com/?d=cG95aXBvYm95b2MucWVj\nAll functions will be instantly restored on bistbilisim.com if payment is obtained in full prior to termination. Thanks for  your understanding.', '2023-12-08 02:38:16'),
(53, 'Wazera', 'mike@mikewazera.com', '06-69357350', 'hey I have a list of highly targeted buyers that want to work with your company, but I need a message to send them, do you have any ideas? And would you be willing to give me a referral kickback for anyone I send?', '2023-12-09 20:04:28'),
(54, 'Mike Salomon\r\n', 'mikeAutollatuh@gmail.com', '88412697226', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Salomon\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2023-12-11 20:57:04'),
(55, 'Lisa Smith', 'notification@instantnic.com', '001-949-973-14', 'Warning: We are not responsible for any economic losses, information loss, reduction in SEO rankings, overlooked clients, undeliverable email or any other detriments that you may experience after the expiration of bistbilisim.com. For more details please refer to section 10.a.1a of our Terms of Service.\nHere is your ultimate notice to extend bistbilisim.com:\nhttps://instantnic.com/?d=cG95aXBvYm95b2MucWVj\nIn the event that bistbilisim.com expires, we hold the authority to offer your spot to rival businesses in the same industry and area after 3 business days on an auction basis.\nThis is the last notice that we are legally required to send out regarding the expiration of bistbilisim.com\nSafe Online Payment:\nhttps://instantnic.com/?d=cG95aXBvYm95b2MucWVj\nAll services will be automatically restored on bistbilisim.com if payment is received in full before termination. Thank you for  your cooperation.', '2023-12-12 04:42:52'),
(56, 'Silvestri', 'harriet.silvestri@googlemail.com', '08025 43 02 89', 'With keyword targeted PPV ads I can get you qualified website visitors for less than a penny per click. This method works for both local and online businesses. Very easy to get started. Just sign up, give me your website and I\'ll provide the traffic.\r\n\r\nFor details, shoot me an email or Skype me at my contact info below.\r\n\r\nP. Stewart\r\nSkype: live:.cid.ad0ee8f191cd36b4\r\nEmail: ps83728@gomail2.xyz', '2023-12-12 20:20:56'),
(57, 'Thornber', 'jay.thornber@outlook.com', '3362921907', 'Discover our latest research findings based on continuous SEO feedback from our strategies:\r\n\r\nVisit https://alwaysdigital.co/ls/ to explore the impact of the new Semrush Backlinks on boosting the SEO trend of your website instantly.\r\n\r\nOur approach is straightforward – we create links from domains with a substantial number of ranking keywords. Forget about conventional SEO metrics and other factors touted by numerous tools. The most valuable link is one from a website with a robust trend and numerous ranking keywords.\r\n\r\nTo delve into the details, visit https://alwaysdigital.co/ls/.\r\n\r\nIt\'s a cost-effective solution. Give it a try soon!\r\n\r\n\r\nP.S:  We are also experts in web development. Click here for more details: https://outsource-bpo.com/website/', '2023-12-14 07:51:36'),
(58, 'Medlock', 'medlock.donny@gmail.com', '041 259 20 53', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at my email or skype below for details.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps6356@gomail2.xyz', '2023-12-14 22:34:07'),
(59, 'Maria Patel', 'notification@registered.biz', '819.654.9279x5', 'Notice: We are not responsible for any monetary loss, data loss, decline in SEO rankings, missed clients, undeliverable email or any other harm that you may incur upon the expiry of bistbilisim.com. For more info please look at section 12.i.1a of our User Agreement.\nThis is your last notice to continue bistbilisim.com:\nhttps://registered.biz/renew/QklTVEJJTElTSU0uQ09N\nIn the case that bistbilisim.com ceases, we reserve the privilege to present your position to contending businesses in the equivalent sector and zone after 3 business days on an sale basis.\nThis constitutes the last notice that we are legally required to send out pertaining to the termination of bistbilisim.com\nProtected Online Payment:\nhttps://registered.biz/renew/QklTVEJJTElTSU0uQ09N\nAll operations will be instantly renewed on bistbilisim.com if payment is received in full prior to termination. Thank you for  your immediate attention to this.', '2023-12-18 02:52:14'),
(60, 'Winburn', 'winburn.karla@hotmail.com', '7707831265', 'I hope this email finds you well. I wanted to take a moment to discuss how our Monthly SEO Services can significantly impact your business\'s bottom line, driving both profit and sales growth.\r\n\r\n1. Increased Visibility, Increased Sales \r\n2. Targeted Traffic for Conversions \r\n3. Enhanced Conversion Rates \r\n4. Competitive Edge in Sales \r\n5. Measurable ROI \r\n6. Adaptation to Market Trends \r\n\r\nWe\'d be thrilled to discuss how our tailored Monthly SEO Services can specifically contribute to the profitability and sales growth of your business. When would be a convenient time for a discussion? Let\'s collaborate to unlock the full potential of your online success. Find out more at https://digitalpromax.co/', '2023-12-21 17:56:08'),
(61, 'Mike Thorndike\r\n', 'mikeavaililkSib@gmail.com', '81542863639', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\nFor any of our SEO plans, we have a December SALE campaign with -30% discounts \r\nApply this coupon on the basket page: XMS30 \r\n \r\nRegards \r\nMike Thorndike\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2023-12-23 17:29:13'),
(62, 'Meehan', 'ada.meehan@yahoo.com', '30-51-16-31', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at my email or skype below for details.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps1963@gomail2.xyz', '2023-12-28 00:58:40'),
(63, 'Mike Faber\r\n', 'mikefamnirraw@gmail.com', '89549747448', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nDecember SALE -30% coupon: XMS30 \r\n \r\nThanks and regards \r\nMike Faber\r\n', '2023-12-28 14:07:30'),
(64, 'Hyett', 'hyett.lakeisha@gmail.com', '03.02.40.46.41', 'With keyword targeted PPV ads I can get you qualified website visitors for less than a penny per click. This method works for both local and online businesses. Very easy to get started. Just sign up, give me your website and I\'ll provide the traffic.\r\n\r\nFor details, shoot me an email or Skype me at my contact info below.\r\n\r\nP. Stewart\r\nSkype: live:.cid.ad0ee8f191cd36b4\r\nEmail: ps21200@gomail2.xyz', '2023-12-28 23:38:17'),
(65, 'Shume', 'dougshume@gmail.com', '0346 0229283', 'Hi, I have an overflow of customers that I\'d like to send to you but I want to make sure you can handle more leads, let me know if you\'d like me to send you more info.', '2023-12-29 20:58:32'),
(66, 'Mike Michaelson\r\n', 'peterfamnirraw@gmail.com', '84165451131', 'Hi there \r\n \r\nI have just took an in depth look on your  bistbilisim.com for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will improve your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Michaelson\r\n \r\nDigital X SEO Experts', '2023-12-31 05:41:17'),
(67, 'Boas', 'kimberly.boas@yahoo.com', '0660 587 34 74', 'Looking to enhance your website\'s reach? I\'m here to help! I\'ll personally blast your classified ads on 2,000+ high-traffic pages in the US and Canada, 500+ blogs, and 150+ social sites. My manual submission service ensures your ads land in the perfect places. Monitor and adjust your ad for maximum impact. Let\'s get your message out there, reach a wider audience, and boost your website\'s SEO together!\r\n\r\nFor details, shoot me an email or Skype me at my contact info below.\r\n\r\nP. Stewart\r\nSkype: live:.cid.ad0ee8f191cd36b4\r\nEmail: ps4931@gomail2.xyz\r\n', '2024-01-02 00:04:00'),
(68, 'Evans', 'libbyevans461@gmail.com', '201-755-9847', 'Hi there,\r\n\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. \r\n\r\n- We guarantee to gain you 300-1000+ followers per month.\r\n- People follow you because they are interested in you, increasing likes, comments and interaction.\r\n- All actions are made manually by our team. We do not use any \'bots\'.\r\n\r\nThe price is just $60 (USD) per month, and we can start immediately.\r\n\r\nIf you have any questions, let me know, and we can discuss further.\r\n\r\nKind Regards,\r\nLibby', '2024-01-02 20:54:23'),
(69, 'Mike Martin\r\n', 'mikeSeapows@gmail.com', '86699348378', 'Hi there \r\n \r\nThis is Mike Martin\r\n \r\nLet me introduce to you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Martin\r\n \r\nmike@strictlydigital.net', '2024-01-05 08:03:45'),
(70, 'TobiasProgs', 'no.reply.OleSimonson@gmail.com', '82843513469', 'Hey! bistbilisim.com \r\n \r\nDid you know that it is possible to send a proposal legally and without any legal repercussions? We provide a novel method of sending requests through contact forms. These kinds of feedback forms can be found on numerous websites. \r\nWhen such requests are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals securely. Messages sent through Communication Forms have less of a chance of being classified as spam, as they are viewed as important. \r\nWe give you the chance to sample our service without any cost. \r\nYou can benefit from our service of sending up to 50,000 messages. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis message was automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp  +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\n \r\nWe only use chat for communication.', '2024-01-05 08:38:06'),
(71, 'Caldwell', 'caldwell.shawn@gmail.com', '1295716263', '\r\nWhy choose Our ongoing monthly SEO services?\r\n\r\nSEO is a great addition to your digital marketing plan if you want to help your business reach more valuable traffic and earn new leads. By investing in monthly SEO services, you’ll continue to optimize your site and earn new traffic. At our company, we have more than 16 years of experience creating SEO plans that drive results.\r\n\r\n We have a team of 50+ experts that will bring their knowledge and expertise to your campaign. Our team will help you create an SEO plan that works for your business.\r\n\r\nIf you’re looking for an SEO company that drives results, look no further than us. To date, we’ve driven over 3x in sales and over 2x leads for our clients. We focus on driving successful campaigns for our clients first.\r\n\r\nKnow more about us at \r\n\r\nhttps://digitalpromax.co/lb/\r\n\r\nAlso if you have Web development needs, Hire our Web developer at \r\nhttps://outsource-bpo.com/website/', '2024-01-05 09:56:40');
INSERT INTO `contact` (`id`, `name`, `email`, `tel`, `message`, `tarih`) VALUES
(72, 'Mike Oliver\r\n', 'mikeroda@gmail.com', '82439559398', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Oliver\r\n \r\nMonkey Digital', '2024-01-05 12:36:19'),
(73, 'Stewart', 'noreplyhere@aol.com', '342-123-4456', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at my email or skype below for details.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps6532@gomail2.xyz', '2024-01-06 17:20:21'),
(74, 'Abdul Rahman', 'mohamadabdulraman447@gmail.com', '85861916459', 'Hello, \r\n \r\nOur investors are seeking business opportunities and projects for possible funding and capital financing. We can discuss more. \r\n \r\nRegards \r\n \r\nMr Abdul Rahman \r\nA.N Brokers \r\nLondon \r\ninfo@alnasserbrokers.com \r\nMobile: +447741944775 \r\nWhatsApp: +447741944775', '2024-01-07 00:49:36'),
(75, 'Lujan', 'lujan.edna@yahoo.com', '05.57.10.47.54', 'NEW &quot;60 Second Side Hustle” Banks A Crazy $61 Per Hour..On Complete Autopilot... Making Me  Over $1,300+ Per Day! https://bit.ly/47m5wCF', '2024-01-07 08:08:46'),
(76, 'MacNeil', 'janie.macneil@gmail.com', '0388 4574122', 'This is seriously perfect for you bit.ly/3tSF9GN', '2024-01-07 14:05:34'),
(77, 'Corwin', 'alison.corwin@gmail.com', '079 6101 8775', 'You won\'t believe this completely automated system that earns you $1,000 a day without effort: https://bit.ly/4aK6HyN', '2024-01-07 14:37:57'),
(78, 'Code', 'lee.code@gmail.com', '0337 7227340', 'I didn\'t think this was possible: https://bit.ly/41RjQCk', '2024-01-07 15:25:45'),
(79, 'Cage', 'thisiswilliamcage@gmail.com', '(03) 5381 6302', 'I saw something wrong with your Google Map listing, is this a good place to send a report of the issues I found?', '2024-01-10 02:10:56'),
(80, 'Mike Nicholson\r\n', 'mikeAutollatuh@gmail.com', '86257938129', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\n \r\nThanks and Regards \r\nMike Mike Nicholson\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2024-01-10 03:32:06'),
(81, 'Cage', 'thisiswilliamcage@gmail.com', '67 289 06 11', 'I saw something wrong with your Google Map listing, is this a good place to send a report of the issues I found?', '2024-01-11 02:39:26'),
(82, 'Tillyard', 'tillyard.jasmine@msn.com', '0660 591 07 65', 'Hello Everyone! Thank you for taking the time to read this. We\'re an online marketing agency which specializes in Search Engine Optimization. We\'ve been in the SEO business providing high quality SEO Services building successful SEO campaigns for over 15 years and have completed over 31,000 orders while serving 1000s of highly satisfied clients. If you have any questions please contact us and we\'ll get back to you ASAP. Contact us at \r\nhttps://digitalpromax.co/lb/', '2024-01-11 09:49:49'),
(83, 'Fouch', 'brentfouch@aiviralvideo.com', '026 740 24 33', 'Hey, I noticed your website isn\'t using AI yet, can I send over something that I think would help?', '2024-01-13 04:21:00'),
(84, 'Ryan', 'heyitsbobbyryan@gmail.com', '(08) 8305 4674', 'Hi, I noticed a few problems affecting your website on Google, is this a good place to send them?', '2024-01-13 14:25:42'),
(85, 'Huckstep', 'huckstep.jana@yahoo.com', '031 598 95 77', 'Want to extract emails and phone numbers from your video viewers? Our new patented method does just that.\r\n\r\nShoot me an email or skype message below for more details\r\n\r\nSamuel\r\nemail: videogamification@gmail.com\r\nskype: live:.cid.d347be37995c0a8d', '2024-01-14 00:19:13'),
(86, 'Evans', 'hifromjohnevans@gmail.com', '60-92-11-07', 'Hey, I made you a free marketing video for your website, is this a good place to send it?', '2024-01-15 07:12:34'),
(87, 'Mike Larkins\r\n', 'mikeavaililkSib@gmail.com', '87437545858', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\nRegards \r\nMike Larkins\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2024-01-16 00:20:36'),
(88, 'Yancey', 'yancey.latoya@gmail.com', '0981-6129103', 'You\'re reading this message and I can make millions of people read your message the exact same way!. Don\'t worry, it doesn\'t cost much Hit me up via email or skype for details.\r\n\r\nPhil Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps980 10@gomail2.xyz', '2024-01-16 03:35:33'),
(89, 'ppu-prof_Hes', '66511549@seo-ul.store', '85187533766', 'Забота о резиденции - это забота о вашем комфорте. Тепловая обработка фасадов - это не только изысканный облик, но и обеспечение тепла в вашем уединенном уголке. Наша бригада, бригада мастеров, предлагаем вам превратить ваш дом в идеальное жилище. \r\nНаши работы - это не просто теплоизоляция, это творческое воплощение с каждым шагом. Мы осуществляем совершенному сочетанию между изысканностью и эффективностью, чтобы ваш дом преобразился не только теплым и стильным, но и привлекательным. \r\nИ самое главное - доступные тарифы! Мы полагаем, что профессиональные услуги не должны быть дорогим удовольствием. &lt;a href=https://ppu-prof.ru/&gt;Утепление фасадов цена за м&lt;/a&gt; начинается всего от 1250 руб/кв. метр. \r\nИнновационные технологии и материалы высокого стандарта позволяют нам создавать теплоизоляцию, долговечную и надежную. Позабудьте о проблемах с холодом стен и избежите дополнительных расходов на отопление - наше утепление станет вашим надежным экраном от холода. \r\nПодробнее на &lt;a href=https://ppu-prof.ru/&gt;https://ppu-prof.ru&lt;/a&gt; \r\nНе откладывайте на потом заботу о благополучии в вашем доме. Обращайтесь к специалистам, и ваше жилье станет настоящим художественным творением, которое согреет вас не только теплом. Вместе мы создадим дом, в котором вам будет по-настоящему удобно!', '2024-01-17 02:31:11'),
(90, 'Gower', 'christel.gower@gmail.com', '06-36893329', 'Unlock the full potential of your website\'s Search Engine Rankings with our strategic backlinking solutions at https://alwaysdigital.co/lg . Our proven techniques will not only enhance your site\'s authority but also boost your google rankings, drive targeted traffic, improving your online success.\r\n\r\nWhat you get:\r\n\r\nQuality Backlinks: Gain authority with high-quality backlinks from reputable sources.\r\n\r\nDiverse Strategies: Utilize various techniques like guest posting and content outreach for a well-rounded backlink profile.\r\n\r\nCustomized Approach: Tailored strategies to meet your unique business goals and audience.\r\n\r\nReady to see measurable results? Schedule a consultation with our experts to discuss how our backlinking services can elevate your brand. Click now https://alwaysdigital.co/lg', '2024-01-18 18:09:11'),
(91, 'Tigran Ayrapetyan', 'ujn2esbgakah@opayq.com', '88224444654', 'Hello, \r\n \r\nWe provide funding through our venture capital company to both start-up and existing companies either looking for funding for expansion or to accelerate growth in their company. \r\nWe have a structured joint venture investment plan in which we are interested in an annual return on investment not more than 10% ROI. We are also currently structuring a convertible debt and loan financing of 3% interest repayable annually with no early repayment penalties. \r\n \r\nWe would like to review your business plan or executive summary to understand a much better idea of your business and what you are looking to do, this will assist in determining the best possible investment structure we can pursue and discuss more extensively. \r\n \r\n \r\nI hope to hear back from you soon. \r\n \r\nSincerely, \r\n \r\nTigran Ayrapetyan \r\nInvestment Director \r\nDevcorp International W.L.L. \r\nP.O Box 10236 Shop No. 305 \r\nFlr 3 Manama Centre, Bahrain \r\nEmail: tigran.a@devcorpinternational.com', '2024-01-19 07:01:24'),
(92, 'Mike Thompson\r\n', 'peterfamnirraw@gmail.com', '83711442417', 'Hi \r\n \r\nI have just took an in depth look on your  bistbilisim.com for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will improve your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Thompson\r\n \r\nDigital X SEO Experts', '2024-01-22 20:31:02'),
(93, 'Mike MacAdam\r\n', 'mikefamnirraw@gmail.com', '82875831283', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\n \r\nThanks and regards \r\nMike MacAdam\r\n', '2024-01-24 19:15:12'),
(94, 'Battarbee', 'battarbee.denis@yahoo.com', '51-57-18-71', '\r\nSeeking a trusted CPA for financial assurance and precise reporting? Explore our top-notch services, including expert financial statement audits, streamlined reviews, and comprehensive tax solutions. Elevate your financial game with San Diego CPA - where expertise meets tailored excellence. For a free consultation today, contact me directly or visit my site below.\r\n\r\n\r\nBest regards,\r\n\r\n\r\nMichelle Encines, Manager\r\nSan Diego, CPA A Professional Tax and Accountancy Corporation\r\nProfessional Advice. Sharper Results.\r\n5703 Oberlin Drive Suite 107\r\nSan Diego, CA 92121\r\n(858)246-6519 Office\r\n(866)272-8296 Toll free\r\n(858)800-3888 fax\r\nwww.sandiegocpas.com\r\n', '2024-01-24 20:16:34'),
(95, 'Mike Hawkins\r\n', 'mikefamnirraw@gmail.com', '81647392454', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\n \r\nThanks and regards \r\nMike Hawkins\r\n', '2024-01-25 15:23:12'),
(96, 'Kotter', 'fausto.kotter@gmail.com', '06-28911438', 'This message showed up to you and I can make your message show up to millions of websites the same way. It\'s awesome and low-cost.If you are interested, you can reach me via email or skype below.\r\n\r\nP. Stewart\r\nEmail: yebyhk@gomail2.xyz\r\nSkype: live:.cid.37ffc6c14225a4a8', '2024-01-26 19:27:38'),
(97, 'Stace', 'stace.ernest@outlook.com', '(62) 6516-6225', 'Nobody Beats Our Pricing And Quality. #1 Rated Backlink Building SEO Agency. Get Started.\r\n1,500+ SEO\'s Use Our Backlink Service Every Month To Power Their SEO Campaign.\r\n\r\nOur backlink service is used and trusted by 1,500+ digital marketing agencies to power their clients SEO. Whether you\'re a business owner or an agency, we can help propel your SEO.\r\n\r\nCheck out for the Best SEO LINK BUILDING Packages: https://alwaysdigital.co/lgt/', '2024-01-27 05:56:52'),
(98, 'Sam Ibrahim', 'aramco@mbox.re', '81416657316', 'Hello, \r\n \r\nWe extend warm greetings to your esteemed company and formally invite you to register as a vendor for potential partnerships in upcoming projects with SAUDI ARAMCO/UAE in 2024/2025. \r\n \r\nThese projects offer a global opportunity, welcoming participation from companies worldwide. Should your company express interest in this endeavor, we kindly request confirmation by contacting ibrahim@aramcointernational.net of intent by requesting the necessary documents. \r\n \r\nYour interest is highly valued, and we eagerly await your prompt response. \r\n \r\nBest Regards, \r\n \r\nMr. Sam Ibrahim \r\nibrahim@aramcointernational.net \r\nhttp://www.aramcointernational.net/ \r\nContract &amp; Supplier Services Management', '2024-01-27 12:28:54'),
(99, 'Mike Arthurs\r\n', 'mikeroda@gmail.com', '89885423762', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Arthurs\r\n \r\nMonkey Digital', '2024-01-31 18:57:09'),
(100, 'Fouch', 'brentfouch@aiviralvideo.com', '(03) 5347 4926', 'Can I send you something to help your website use AI?\r\n', '2024-02-01 12:21:05'),
(101, 'Mike Lamberts\r\n', 'mikeSeapows@gmail.com', '83732484551', 'Hi there \r\n \r\nThis is Mike Lamberts\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Lamberts\r\n \r\nmike@strictlydigital.net', '2024-02-02 13:20:37'),
(102, 'Rimmer', 'iva.rimmer@gmail.com', '52-82-07-40', 'Development Outsourcing Agency — Development Outsourcing...\r\n\r\nLeading Outsource Development Company. Trusted for 10+ years. Our top devs join your team. Let\'s talk about the our Advantage! Leading Outsource Development Company for 10+ years.\r\nPrices for a simple website starts @ $80. Ecommerce sites $300. Hourly Rate of $7. Contact us now. https://outsource-bpo.com/website/\r\n\r\nAlso, Introducing Turbo Charged, Super Powerful Backlinks for your website\'s SEO.\r\nBuilding Quality Links is tough. Let The Experts Do It Right For Your Target Market. We Provide Backlink Services that Offer the Strongest, But Affordable Links.\r\nRead carefully here - https://alwaysdigital.co/lgt\r\nand See your SEO rankings Sky Rocket', '2024-02-03 07:23:54'),
(103, 'Roussel', 'roussel.garry@yahoo.com', '05.76.82.24.67', 'This message arrived to you and I can make your ad message reach millions of websites the same way. It\'s a low-priced and effective way to market your product or service.Contact me by email or skype below if you want to know more.\r\n\r\nP. Stewart\r\nEmail: 721k5s@gomail2.xyz\r\nSkype: live:.cid.37ffc6c14225a4a8', '2024-02-05 00:19:37'),
(104, 'David Edwards', 'agentofficial@shrooqconsultant.com', '88157561887', 'Greetings, \r\n \r\nAm glad to connect with you, My name is David Edwards, am an investment consultant with Shrooq AlQamar Project Management Services Co LLC, I have been mandated by the company to source for investment opportunities and companies seeking for funding, business loans, for its project(s). Do you have any investment or project that is seeking for capital to fund it? \r\n \r\nOur Investments financing focus is on: \r\n \r\nSeed Capital, Early-Stage, Start-Up Ventures, , Brokerage, Private Finance, Renewable Energy Project, Commercial Real Estate, Blockchain, Technology, Telecommunication, Infrastructure, Agriculture, Animal Breeding, Hospitality, Healthcare, Oil/Gas/Refinery. Application reserved for business executives and companies with proven business records in search of funding for expansion or forcapital investments.. \r\n \r\nKindly contact me for further details. \r\n \r\nawait your return e.mail soonest. \r\n \r\nRegards \r\n \r\nDr. David Edwards \r\n \r\nShrooq AlQamar Regional Consultant \r\nAddress: 72469 Jahra Road Shuwaikh Industrial \r\nTel/WhatzApp - CEO: +968 7866 9578 \r\n+971 56 663 2687 \r\nEmail: agent@shrooqconsultant.com \r\nOur Offices: \r\nMiddle East Facilitating Office: Ahmad Al Jaber St, Kuwait City, Kuwait \r\nOman Branch Offices: CHXM+J3G, Sohar, Oman \r\nUAE Dubai: Financial Consortium', '2024-02-06 10:54:21'),
(105, 'Ryan', 'heyitsbobbyryan@gmail.com', '452 24 401', 'Hello, I\'ve observed some issues with your website\'s performance on Google. May I send the details here?', '2024-02-06 21:30:27'),
(106, 'Mike Barrington\r\n', 'mikeAutollatuh@gmail.com', '87251118994', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\n \r\nThanks and Regards \r\nMike Mike Barrington\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2024-02-08 14:03:26'),
(107, 'Coull', 'wm.coull@gmail.com', '0496 87 35 44', 'Hire now &gt; https://digitalpromax.co/la/ › seo-packages &gt; Monthly SEO Services\r\nWe offer a premium suite of monthly SEO packages designed to help any kind of business generate more traffic, conversions, and sales online.\r\nFull-Service SEO Partners | Top-Ranked SEO Agencies\r\nResponsive &amp; Proactive SEO Agencies. Verified client reviews to help you find an SEO firm. Content writing. Technical SEO.\r\nFull Speed Growth · Faster Growth Pack Guaranteed · \r\n\r\nWe also do eCommerce Website Development &amp; Web Design Services\r\nContact now &gt; https://www.outerboxdesign.com › Ecommerce-Eebsite-Development\r\nWe\'re the Leading eCommerce Website Design Company &amp; eCommerce Website Development Agency. 50+ Employees In-House. 20+ Years in Business. Unlimited Categories/ Products. Payment gateway Integration.', '2024-02-09 05:36:10'),
(108, 'Jones', 'emilyjones2250@gmail.com', '785-483-6995', 'Hi there,\r\n\r\nWe run a YouTube growth service, which increases your number of subscribers both safely and practically. \r\n\r\n- We guarantee to gain you 700-1500+ subscribers per month.\r\n- People subscribe because they are interested in your channel/videos, increasing likes, comments and interaction.\r\n- All actions are made manually by our team. We do not use any \'bots\'.\r\n\r\nThe price is just $60 (USD) per month, and we can start immediately.\r\n\r\nIf you have any questions, let me know, and we can discuss further.\r\n\r\nKind Regards,\r\nEmily', '2024-02-10 21:06:21'),
(109, 'Fouch', 'brentfouch@aiviralvideo.com', '044 862 87 41', 'May I send you something to enhance your website with AI?\r\n', '2024-02-11 04:30:45'),
(110, 'uetvFrjhMX', 'dekkfripeo@outlook.com', '4110221747', 'ieyMCLflItkn', '2024-02-11 15:29:19'),
(111, 'uetvFrjhMX', 'dekkfripeo@outlook.com', '4110221747', 'ieyMCLflItkn', '2024-02-11 15:29:20'),
(112, 'DnbRfLucmBg', 'dekkfripeo@outlook.com', '5847313301', 'zqjNnTHU', '2024-02-11 15:29:27'),
(113, 'DnbRfLucmBg', 'dekkfripeo@outlook.com', '5847313301', 'zqjNnTHU', '2024-02-11 15:29:28'),
(114, 'Fogle', 'rosa.fogle@googlemail.com', '06-33367474', 'GAMIFY your videos and get viewers to happily give you their email and phone number.  There is no other tech like this..it’s the next big thing. As seen on CBS, NBC, FOX, and ABC.  \r\nSee if you qualify for a free GAMIFICATION of your video.\r\n\r\nContact me via my email or skype below for more details\r\n\r\n\r\nRobert\r\nemail: gamifyvideo@gmail.com\r\nskype: live:.cid.d347be37995c0a8d', '2024-02-11 17:13:19'),
(115, 'Huey', 'jestine.huey@gmail.com', '06561 98 74 80', 'This message arrived to you and I can make your ad message reach millions of websites the same way. It\'s a low-priced and effective way to market your product or service.Contact me by email or skype below if you want to know more.\r\n\r\nP. Stewart\r\nEmail: wqt2p4@gomail2.xyz\r\nSkype: live:.cid.2bc4ed65aa40fb3b', '2024-02-13 15:57:58'),
(116, 'Fouch', 'brentfouch@aiviralvideo.com', '06-24976977', 'Have you noticed your website\'s performance problems?\r\n', '2024-02-13 22:46:38'),
(117, 'Trujillo', 'cristine.trujillo@gmail.com', '724-372-5033', 'I\'m Sam, a Web designer and App Developer, currently working with an Indian-based company, bringing over 7 years of experience to the field.\r\n\r\nWe specialize in developing a variety of apps, including:\r\n\r\n1. Food Delivery Apps, \r\n2. School Driving Training App, \r\n3. Taxi/Travel Apps, \r\n4. Real Estate Apps, \r\n5. Health Fitness Apps, \r\n6. M-Commerce Apps, \r\n7. Android Apps, \r\n8. Mac OSX Apps, \r\n9. Custom Web Apps, \r\n10. iPhone and iPad Apps\r\n\r\nWhether it\'s iPhone and iPad Apps or Android Apps, we\'ve got you covered. If you\'re interested in Mobile App or Web Development Services, I can provide you with our past work and pricing details. Click here for more information: https://outsource-bpo.com/website/\r\n\r\nPS: We also do SEO Services for your website. Excellent Results and Fair prices - https://digitalpromax.co/la/', '2024-02-15 11:54:33'),
(118, 'Mike Miers\r\n', 'mikeavaililkSib@gmail.com', '89425623729', 'Hi there \r\n \r\nJust checked your bistbilisim.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\nRegards \r\nMike Miers\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2024-02-17 11:20:34'),
(119, 'Changvoxia', 'istpaingistol@gmail.com', '88631999656', 'Artificial Intelligence is able to create videos. \r\nWhat you think is the first use of that? \r\nOf course, Porn. Are you curious to check it out? \r\nIs free. https://hentai.movie', '2024-02-18 23:55:40'),
(120, 'Mike Charlson\r\n', 'mikefamnirraw@gmail.com', '82266522784', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\n \r\nThanks and regards \r\nMike Charlson\r\n', '2024-02-20 08:55:40'),
(121, 'Fuerst', 'roland.fuerst91@msn.com', '04832 61 77 57', 'Earn up to $60,000 USD as a 4U2 Inc. Independent Contractor Agent! We\'re seeking individuals worldwide with computer access, fluent English communication skills, and a desire to save time and money for suppliers, buyers, and salespersons in our E-Commerce Marketplace. Join our mission to &quot;Save Suppliers, Buyers, and Salespersons Time, Money, and make Money!&quot; Contact us at 4u2inc123@gmail.com for more info..', '2024-02-21 18:55:50'),
(122, 'Mike Nelson\r\n', 'peterfamnirraw@gmail.com', '87667859534', 'Good Day \r\n \r\nI have just analyzed  bistbilisim.com for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will increase your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Nelson\r\n \r\nDigital X SEO Experts', '2024-02-25 10:20:15'),
(123, 'Mike Allford\r\n', 'mikeSeapows@gmail.com', '84523756787', 'Hi there \r\n \r\nThis is Mike Allford\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Allford\r\n \r\nmike@strictlydigital.net', '2024-02-26 20:05:01'),
(124, 'Reyes', 'reyes.moses@outlook.com', '489 7077', 'Get Our Turbo Charged Link Building Plan: https://alwaysdigital.co/lgt/\r\n\r\n1. Brand Awareness\r\n2. Recurring Income\r\n3. Builds Credibility\r\n4. Boosts Online Visibility\r\n5. Opens Better Revenue Opportunities\r\n6. Increase Your Website Traffic\r\n7. Raises Your SEO Scores and Site Metric\r\n8. Ensures Consistent Conversion Rates\r\n9. Collect Email Subscribers \r\n10. More Social Media Followers \r\n11. Gets Your Page Indexed Fast by Increasing Your Crawl Rate\r\n12. Supports Google Ranking Criteria\r\n\r\nContact us @ https://alwaysdigital.co/lgt/', '2024-02-27 05:37:25'),
(125, 'Mike Arnold\r\n', 'mikeroda@gmail.com', '87336386898', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Arnold\r\n \r\nMonkey Digital', '2024-02-27 12:44:07'),
(126, 'kWhiFfRy', 'hallmark4910@aol.com', '2425824480', 'soctwvYWirOMd', '2024-03-01 00:07:53'),
(127, 'kWhiFfRy', 'hallmark4910@aol.com', '2425824480', 'soctwvYWirOMd', '2024-03-01 00:07:55'),
(128, 'RZlqLKQXphDUM', 'hallmark4910@aol.com', '5051129683', 'HYBItKGr', '2024-03-01 00:08:05'),
(129, 'RZlqLKQXphDUM', 'hallmark4910@aol.com', '5051129683', 'HYBItKGr', '2024-03-01 00:08:07'),
(130, 'Denney', 'mitchel.denney@yahoo.com', '09364 78 22 08', 'The average viewer watches a video for only 12 seconds…this new tech rewards viewers for watching your entire video.  GAMIFYING your Youtube video is changing the way companies market. \r\nAs seen on CBS, NBC, FOX, and ABC. \r\n\r\nShoot me an email or skype msg below to see if you qualify for a free GAMIFICATION of your video.\r\n\r\nJordan\r\nemail: gamifyvideo@gmail.com\r\nskype: live:.cid.d347be37995c0a8d', '2024-03-05 05:28:37'),
(131, 'Sissons', 'kelle.sissons@gmail.com', '334-722-5944', 'Have you heard of Se-REM? (Self effective - Rapid Eye Movement). Many people don\'t know that REM brain activity dramatically improves the processing of traumatic emotion. It creates peace and empowers the listener. Se-REM is an advanced version of EMDR therapy. It is more powerful because it combines elements of 6 different therapies, EMDR, hypnosis, mindfulness, Gestalt child within work, music therapy, and Awe therapy,(connecting profoundly with nature).\r\n\r\nIt has helped thousands of people overcome PTSD, and anxiety. But it is also helpful in a great many situations, loss of any kind, grief, and even marital counseling. It\'s mission statement is &quot;Trauma relief at as close to free as possible&quot;. This not-for-profit program downloads to a smart phone or computer and can be used in an office or at home. Read about it, hear samples, and download at: Se-REM.com. Once you own the program, you are encouraged to give it away to others who will benefit. I provide free consultation to all who use the program. Write questions to: davidb@se-rem.com.\r\n\r\nSe-REM.com has a 95% rating on Trustpilot and is in use in 32 countries.', '2024-03-21 07:21:31'),
(132, 'Gibbs', 'gibbs.romaine90@gmail.com', '4491710', 'Get a free video for your website to boost your reputation on social media. Your 5 star reviews become SEO videos that come up when someone Googles your reputation. http://freereviewstovids.info', '2024-03-23 19:41:07'),
(133, 'YWzAVvUDbEXS', 'djibhq5878@gmail.com', '9522213382', 'MrQgDbECYHZkP', '2024-03-24 06:36:30'),
(134, 'YWzAVvUDbEXS', 'djibhq5878@gmail.com', '9522213382', 'MrQgDbECYHZkP', '2024-03-24 06:36:31'),
(135, 'HCpaFMqXbdJsPeZu', 'djibhq5878@gmail.com', '4829534985', 'kgTLzuYKSaJWmHfP', '2024-03-24 06:36:40'),
(136, 'HCpaFMqXbdJsPeZu', 'djibhq5878@gmail.com', '4829534985', 'kgTLzuYKSaJWmHfP', '2024-03-24 06:36:41'),
(137, 'Mike Simon\r\n', 'peterfamnirraw@gmail.com', '88187282922', 'Hi \r\n \r\nI have just checked  bistbilisim.com for the ranking keywords and saw that your website could use a boost. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\n \r\nRegards \r\nMike Simon\r\n \r\nDigital X SEO Experts', '2024-03-24 15:32:32'),
(138, 'G', 'john@data-bank.co', '4738771', 'hello, for top direct marketing visit data-bank.co. We offer rare deals including bulk email campaings and many other benefits. We look forward to helping you grow your brand this year.', '2024-03-25 08:28:23'),
(139, 'Stewart', 'noreplyhere@aol.com', '342-123-4456', 'Ready to blast your message across the digital universe? Just as you\'re engaging with this ad, imagine your brand message reaching countless website contact forms worldwide! Starting at just under $100, unlock the potential to reach 1 million forms. Reach out to me below for details\r\n\r\nP. Stewart\r\nEmail: y8jc5w@mail-to-form.xyz\r\nSkype: form-blasting', '2024-04-01 18:53:15'),
(140, 'Chinner', 'chinner.kay@outlook.com', '8283091011', 'DEADLINE to claim your tax credit: April 15, 2024 \r\n•	Our company is in Arizona andwill help you claim it; up to $32,220. \r\n•	There are NO fees unless we get you your check from the IRS. \r\nDon’t miss your COVID tax credit: \r\nCall Kerry at 480-790-9186\r\nEmail Kerry at kerry@directfunder.com\r\nOr watch the explanation here: https://taxcreditfunder.com/en/', '2024-04-06 05:36:34'),
(141, 'Philip Norman', 'philipnorman777@yahoo.com', '89679639261', 'Greetings \r\nI hope this mail finds you well. I am Mr. Philip Norman a private Funds Manager for high-net-worth individuals. \r\n \r\nI hold a mandate from a Russian Client who wants his funds reinvested using 3rd party due to the current sanctions against Russians, which means all aspect of this transaction will remain confidential, we will discuss details of investment including investing in your company if it’s for expansion only. \r\n \r\nPlease note that there is no risk involved as funds are legal and currently in a Bank without encumbrances, all details will be available as soon as you indicate interest by contacting me via the email or phone number bellow to discuss this opportunity in more detail. \r\n \r\nSincerely, \r\n \r\nMr. Philip Norman \r\nEmail:philipnorman30@gmail.com', '2024-04-10 16:16:35'),
(142, 'Mansfield', 'mansfield.cornell16@googlemail.com', '315-834-6783', 'Have you heard of Se-REM? (Self effective - Rapid Eye Movement). Many people don\'t know that REM brain activity dramatically improves the processing of traumatic emotion. It creates peace and empowers the listener. Se-REM is an advanced version of EMDR therapy. It is more powerful because it combines elements of 6 different therapies, EMDR, hypnosis, mindfulness, Gestalt child within work, music therapy, and Awe therapy,(connecting profoundly with nature).\r\n\r\nIt has helped thousands of people overcome PTSD, and anxiety. But it is also helpful in a great many situations, loss of any kind, grief, and even marital counseling. It\'s mission statement is &quot;Trauma relief at as close to free as possible&quot;. This not-for-profit program downloads to a smart phone or computer and can be used in an office or at home. Read about it, hear samples, and download at: Se-REM.com. Once you own the program, you are encouraged to give it away to others who will benefit. I provide free consultation to all who use the program. Write questions to: davidb@se-rem.com.\r\n\r\nSe-REM.com has a 95% rating on Trustpilot and is in use in 32 countries.', '2024-04-11 13:47:55'),
(143, 'vZjhrWgxdVzUl', 'fdaffire598@gmail.com', '7992378864', 'bWDpUFXwRhjx', '2024-04-11 14:51:43'),
(144, 'vZjhrWgxdVzUl', 'fdaffire598@gmail.com', '7992378864', 'bWDpUFXwRhjx', '2024-04-11 14:51:45'),
(145, 'RevUNWjw', 'fdaffire598@gmail.com', '4323095232', 'QOfDWjUmtKXray', '2024-04-11 14:51:55'),
(146, 'RevUNWjw', 'fdaffire598@gmail.com', '4323095232', 'QOfDWjUmtKXray', '2024-04-11 14:51:57'),
(147, 'Clow', 'clow.devon@outlook.com', '0344 0061463', 'SEO ensures your website stands out when people search for products or services. Google prioritizes relevance and reliability to decide which sites appear on the first pages, underscoring the need for effective website presentation.\r\n\r\nSEO Benefits in Brief:\r\n1. Boosts Visibility and Traffic:\r\n2. Establishes Trust:\r\n3. Yields High ROI:\r\n4. Enhances User Experience:\r\nGoogle announced prioritizing pages based on user experience in their algorithm.\r\nIn essence, SEO is your key to standing out, building trust, and ensuring a high return on investment.\r\n\r\nContact us at https://digitalpromax.co/?src=a14bistbilisim.com\r\n\r\nAlso Need expert hands on your WordPress projects? We\'ve got you covered. Let\'s discuss how our WordPress developers can boost your web endeavors.\r\n\r\nClick here for more details: https://outsource-bpo.com/website/?src=a14bistbilisim.com', '2024-04-11 15:27:10'),
(148, 'fUKPeGTYjk', 'swadeirnn26@gmail.com', '6658677329', 'plWdfgPLuZCrIY', '2024-04-13 23:33:26'),
(149, 'fUKPeGTYjk', 'swadeirnn26@gmail.com', '6658677329', 'plWdfgPLuZCrIY', '2024-04-13 23:33:28'),
(150, 'EOLSxaHgpfD', 'swadeirnn26@gmail.com', '5441332302', 'OEtjLQTsHyJKxha', '2024-04-13 23:33:34'),
(151, 'EOLSxaHgpfD', 'swadeirnn26@gmail.com', '5441332302', 'OEtjLQTsHyJKxha', '2024-04-13 23:33:35'),
(152, 'Brown', 'ameliabrown0325@gmail.com', '8283283077', 'Hi there,\r\n\r\nWe run a YouTube growth service, which increases your number of subscribers both safely and practically. \r\n\r\n- We guarantee to gain you 700-1500+ subscribers per month.\r\n- People subscribe because they are interested in your channel/videos, increasing likes, comments and interaction.\r\n- All actions are made manually by our team. We do not use any \'bots\'.\r\n\r\nThe price is just $60 (USD) per month, and we can start immediately.\r\n\r\nIf you have any questions, let me know, and we can discuss further.\r\n\r\nKind Regards,\r\nAmelia\r\n\r\nUnsubscribe: https://removeme.click/yt/unsubscribe.php?d=bistbilisim.com', '2024-04-14 14:08:46'),
(153, 'emZxSDYcOPqdEV', 'entoncopelqf824@gmail.com', '2618466557', 'fBVWesuFSoA', '2024-04-15 13:35:21'),
(154, 'emZxSDYcOPqdEV', 'entoncopelqf824@gmail.com', '2618466557', 'fBVWesuFSoA', '2024-04-15 13:35:22'),
(155, 'OikeaPTwFxMt', 'entoncopelqf824@gmail.com', '7845206335', 'XOfMNcCqUb', '2024-04-15 13:35:32'),
(156, 'OikeaPTwFxMt', 'entoncopelqf824@gmail.com', '7845206335', 'XOfMNcCqUb', '2024-04-15 13:35:34'),
(157, 'uOWhnwaU', 'kellywilliams7923@yahoo.com', '7728099359', 'iGMKItJlfoamhYX', '2024-04-17 11:17:07'),
(158, 'uOWhnwaU', 'kellywilliams7923@yahoo.com', '7728099359', 'iGMKItJlfoamhYX', '2024-04-17 11:17:08'),
(159, 'KbLQHDhCtrFV', 'kellywilliams7923@yahoo.com', '2215393715', 'PaLSCOotJTfkxQgm', '2024-04-17 11:17:10'),
(160, 'KbLQHDhCtrFV', 'kellywilliams7923@yahoo.com', '2215393715', 'PaLSCOotJTfkxQgm', '2024-04-17 11:17:10'),
(161, 'Elem', 'jon.elem@gmail.com', '437 4739', 'Hi,\r\n\r\nIf you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50 and Bigger package 15 Million forms for Just $125. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a', '2024-04-17 14:11:05'),
(162, 'Loy', 'marcel.loy@gmail.com', '(64) 9525-5967', 'Advantages of hiring a Developer:\r\n\r\nSpecialized Expertise\r\nTailored Customization and Control\r\nTime and Cost Efficiency\r\nCustom Plugin Development\r\nSEO Optimization\r\nOngoing Support and Maintenance\r\nSeamless Integration and Migration\r\nScalability for Business Growth\r\n\r\nHire a web developer now from us. Contact us at https://wpexpertspro.co/website/?src=a21bistbilisim.com', '2024-04-20 18:16:07'),
(163, 'Stewart', 'noreplyhere@aol.com', '342-123-4456', 'Interested in maximizing your reach? You\'re reading this message and I can get others to read your ad the exact same way! Drop me an email below to learn more about our services and start spreading your message effectively!\r\n\r\nP. Stewart\r\nEmail: 7a1kfm@submitmaster.xyz\r\nSkype: form-blasting', '2024-04-20 23:05:36'),
(164, 'DUulTsXfkjAcwtH', 'eallredjd@outlook.com', '4741138772', 'ZhHNKYbcU', '2024-04-22 17:15:23'),
(165, 'DUulTsXfkjAcwtH', 'eallredjd@outlook.com', '4741138772', 'ZhHNKYbcU', '2024-04-22 17:15:24'),
(166, 'vKTpnEfDrhQqG', 'eallredjd@outlook.com', '2029294544', 'XHwmPBYJrtRgNlTb', '2024-04-22 17:15:40'),
(167, 'vKTpnEfDrhQqG', 'eallredjd@outlook.com', '2029294544', 'XHwmPBYJrtRgNlTb', '2024-04-22 17:15:41'),
(168, 'Polen', 'deana.polen@gmail.com', '05.00.62.32.73', 'Hi, My name is Helen and I\'m an Online marketing specialist here in the UK. I\'ve done some initial research on your website/sector, and I couldn\'t help but I notice that your online visibility is fairly low on Google. With your permission I’d like to send you a free report showing you a few things you can do on your own (without needing to hire anyone) to greatly improve these search results for you. \r\n\r\nThe report is very detailed and comes with its own detailed instructions. It will show you exactly what needs to be done to unleash rankings and traffic that make a difference! I\'ll also share some ideas and tips to generate more revenue through your website. \r\n\r\nWould that be, okay? Again, this is completely free- no costs whatsoever just our way of making a super strong first impression as experts in digital marketing! Please email us at anna.fratellimarketing@gmail.com back for a free report. \r\n\r\nWarm Regards, \r\nHelen Waters, \r\nMarketing Account Manager.  \r\nanna.fratellimarketing@gmail.com\r\n\r\nTo unsubscribe please reply NO.', '2024-04-26 08:10:42'),
(169, 'MAyXnRTEGLdtVzCJ', 'edward_tysonzhjl@outlook.com', '4198873648', 'BsZEwLjKarIFOi', '2024-04-26 13:57:32'),
(170, 'MAyXnRTEGLdtVzCJ', 'edward_tysonzhjl@outlook.com', '4198873648', 'BsZEwLjKarIFOi', '2024-04-26 13:57:33'),
(171, 'WxAzvwuySsOhVTJ', 'edward_tysonzhjl@outlook.com', '6728724192', 'kSpcUxro', '2024-04-26 13:57:35'),
(172, 'WxAzvwuySsOhVTJ', 'edward_tysonzhjl@outlook.com', '6728724192', 'kSpcUxro', '2024-04-26 13:57:35'),
(173, 'Conover', 'rudolph.conover@gmail.com', '6767116918', 'Hi \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nBest, \r\n\r\nRudolph', '2024-04-26 21:26:50'),
(174, 'Haynes', 'georginahaynes620@gmail.com', '7700438748', 'Hi,\r\n\r\nI just visited bistbilisim.com and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nGeorgina\r\n\r\nUnsubscribe: https://removeme.click/ev/unsubscribe.php?d=bistbilisim.com', '2024-04-28 22:41:14'),
(175, 'NbQVWRHPJ', 'roy24orosco5va@outlook.com', '3456525654', 'QeJxIpONTHmlXv', '2024-04-29 11:33:42'),
(176, 'NbQVWRHPJ', 'roy24orosco5va@outlook.com', '3456525654', 'QeJxIpONTHmlXv', '2024-04-29 11:33:43'),
(177, 'QfdzeYjG', 'roy24orosco5va@outlook.com', '6301373415', 'xTJywbfVzjvHK', '2024-04-29 11:33:46'),
(178, 'QfdzeYjG', 'roy24orosco5va@outlook.com', '6301373415', 'xTJywbfVzjvHK', '2024-04-29 11:33:47'),
(179, 'JVjESmBkcqlzp', 'sophia_martinez1717@yahoo.com', '4327498749', 'LMOJixyYGEFZfAca', '2024-05-02 20:09:35'),
(180, 'JVjESmBkcqlzp', 'sophia_martinez1717@yahoo.com', '4327498749', 'LMOJixyYGEFZfAca', '2024-05-02 20:09:35'),
(181, 'JvbBpUyf', 'sophia_martinez1717@yahoo.com', '2029665778', 'DJqgbZcpAw', '2024-05-02 20:09:36'),
(182, 'JvbBpUyf', 'sophia_martinez1717@yahoo.com', '2029665778', 'DJqgbZcpAw', '2024-05-02 20:09:37'),
(183, 'ciMyuaSslVYR', 'mona.mcfadden1996@yahoo.com', '5136147408', 'KRjTqiDFPdEZoVt', '2024-05-05 22:37:30'),
(184, 'Wong', 'margery.wong@googlemail.com', '02.18.74.75.44', '&quot;IT\'S...A MILLION DOLLAR...GIVEAWAY&quot;\r\n\r\nYOUR ATTENTION PLEASE!  ALL YOU HAVE TO DO IS SUBSCRIBE TO THE WEBSITE BELOW.  THAT\'S IT!\r\n\r\nAND A FREE $25 DOLLAR GIFT CARD WILL BE EMAILED BACK TO YOU.  &quot;NO SUBSCRIPTION NEEDED&quot; WHICH MEANS NO CREDIT CARDS&quot; JUST SUBSCRIBE USING YOUR EMAIL ADDRESS ONLY!\r\n\r\nTO TAKE ADVANTAGE OF THIS &quot;PROMOTIONAL REWARD&quot; FROM 3 KINGS...USE YOUR GIFT CARD TO PURCHASE ONE OF OUR &quot;RECTANGLE KEY RINGS&quot; FOR ONLY $29.99.\r\n\r\nTHIS IS PART OF OUR &quot;SPECIAL OFFER&quot; FOR SUBSCRIBING TO OUR WEBSITE, AS WE LOOK TO EXPAND OUR BUSINESS.\r\n\r\nVISIT: HTTPS://WWW.MYMOVIEQUOTETSHIRTS.COM\r\n\r\n(GIFT CARD WILL EXPIRE IN TWO WEEKS IF NOT USED)', '2024-05-06 09:12:43'),
(185, 'Louis Wellington', 'wellington-louis@outlook.com', '81723916925', 'Hello, \r\n \r\nI\'m reaching out to you because our technology has identified companies that are interested in your services. \r\n \r\nIndeed, our technology drastically reduces customer acquisition costs in your industry. \r\n \r\nPlease feel free to contact me at the following address wellington-louis@outlook.com with your availability so that we can schedule a demo to show you how to significantly reduce your acquisition costs. \r\n \r\nBest regards, \r\nLouis Wellington', '2024-05-06 10:31:28'),
(186, 'Mike Jeff\r\n', 'peterfamnirraw@gmail.com', '88179456683', 'Hi there \r\n \r\nAre you tired of spending money on advertising that doesn’t work? \r\nWe have the right strategy for you, to meet the right audience within your City boundaries. \r\n \r\nB2B Local City Marketing that works: \r\nhttps://www.onlinelocalmarketing.org/product/local-research-advertising/ \r\n \r\nWith our innovative marketing approach, you will receive calls, leads, and website interactions within a week. \r\n \r\nRegards \r\nMike Jeff\r\n https://www.onlinelocalmarketing.org', '2024-05-07 16:25:24'),
(187, 'Garret', 'bistbilisim.com@yahoo.com', '472497265', 'Hello, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nBange is perfect for students, professionals and travelers. The backpacks and sling bags feature a built-in USB charging port, making it easy to charge your devices on the go.  Also they are waterproof and anti-theft design, making it ideal for carrying your valuables.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nThe Best,\r\n\r\nRobert', '2024-05-10 13:31:06'),
(188, 'Kintore', 'rudy.kintore@gmail.com', '9732692611', 'Hi there,\r\n\r\nI recently came across your website on bistbilisim.com and found it very interesting. I was curious, have you ever considered creating an eBook out of your website content?\r\n\r\nThere are tools available, that allow you to easily convert website content into a well-designed eBook. This could be a great way to repurpose your existing content and potentially reach a new audience.\r\n\r\nOf course, I understand this might not be something you\'re interested in, but I just wanted to share the possibility!\r\n\r\nAnyway, here is the tool I had in mind. It\'s only $16.95 so worth checking out: \r\nhttps://furtherinfo.org/lgb7\r\n\r\nBest regards,\r\nRudy', '2024-05-11 22:06:07'),
(189, 'ZJaHdErf', 'stacey_white1989@yahoo.com', '2099811859', 'apNtzPoCuIkAb', '2024-05-12 11:11:09'),
(190, 'ZJaHdErf', 'stacey_white1989@yahoo.com', '2099811859', 'apNtzPoCuIkAb', '2024-05-12 11:11:11'),
(191, 'CyWumaZk', 'stacey_white1989@yahoo.com', '5222021019', 'RkiaSNosEDjq', '2024-05-12 11:11:27'),
(192, 'CyWumaZk', 'stacey_white1989@yahoo.com', '5222021019', 'RkiaSNosEDjq', '2024-05-12 11:11:29'),
(193, 'Lund', 'verena.lund@gmail.com', '522867271', 'Hi there,\r\n\r\nAre you tired of paying monthly fees for website hosting, cloud storage, and funnels?\r\n\r\nWe offer a revolutionary solution: host unlimited websites, files, and videos for a single, low one-time fee. No more monthly payments.\r\n\r\nLearn more: https://furtherinfo.org/0wg3\r\n\r\nHere\'s what you get:\r\n\r\nUltra-fast hosting powered by Intel® Xeon® CPU technology\r\nUnlimited website hosting\r\nUnlimited cloud storage\r\nUnlimited video hosting\r\nUnlimited funnel creation\r\nFree SSL certificates for all domains and files\r\n99.999% uptime guarantee\r\n24/7 customer support\r\nEasy-to-use cPanel\r\n365-day money-back guarantee\r\n\r\nPlus, get these exclusive bonuses when you act now:\r\n\r\n60+ reseller licenses (sell hosting to your clients!)\r\n10 Fast-Action Bonuses worth over $19,997 (including AI tools, traffic generation, and more!)\r\n\r\nDon\'t miss out on this limited-time offer! The price is about to increase, and this one-time fee won\'t last forever.\r\n\r\nClick here to learn more: https://furtherinfo.org/0wg3\r\n\r\nVerena', '2024-05-12 13:00:27'),
(194, 'Dwyer', 'denese.dwyer@gmail.com', '22-49-17-92', 'Dear bistbilisim.com owner,\r\n\r\nIf you\'re receiving this message, it signifies the effectiveness of my marketing approach. I specialize in extending the reach of your advertising message across 5 million sites for just $50. Additionally, you have the option to expand your campaign to 15 million platforms for a mere $125. This presents an unparalleled opportunity to promote your business or services affordably.\r\n\r\nTo explore this lucrative marketing opportunity further, please feel free to contact me via email at virgo.t3@gmail.com or connect with me on Skype at live:.cid.dbb061d1dcb9127a\r\n\r\nLooking forward to propelling your marketing efforts to new heights.', '2024-05-19 07:23:33'),
(195, 'fhXTuMvyC', 'ruyungwilliam4830@yahoo.com', '7416639684', 'TjQKqSEOWAI', '2024-05-19 13:48:28'),
(196, 'qokhjJiwzta', 'ruyungwilliam4830@yahoo.com', '7090764099', 'uFClswZfi', '2024-05-19 13:48:38'),
(197, 'lKBPNpAbjhTQegka', 'konstantinw29bme@outlook.com', '4119703001', 'WXfgnslGdY', '2024-05-23 03:24:42'),
(198, 'QFxNStjqrhzo', 'konstantinw29bme@outlook.com', '2928766676', 'sAONDRFgUIkjtav', '2024-05-23 03:24:45');
INSERT INTO `contact` (`id`, `name`, `email`, `tel`, `message`, `tarih`) VALUES
(199, 'Jones', 'emilyjones2250@gmail.com', '3576407611', 'Hi there,\r\n\r\nWe run a Youtube growth service, where we can increase your subscriber count safely and practically. \r\n\r\n- Guaranteed: We guarantee to gain you 700-1500 new subscribers each month.\r\n- Real, human subscribers who subscribe because they are interested in your channel/videos.\r\n- Safe: All actions are done, without using any automated tasks / bots.\r\n\r\nOur price is just $60 (USD) per month and we can start immediately.\r\n\r\nIf you are interested then we can discuss further.\r\n\r\nKind Regards,\r\nEmily', '2024-05-24 04:45:53'),
(200, 'Zajac', 'zajac.carrol40@yahoo.com', '0660 903 93 07', 'Hi bistbilisim.com Admin,\r\n\r\nI am curious to know how much you would charge for a link insertion in an existing post?\r\n\r\nDo you also allow the publication of sponsored posts on your blog? What\'s the fee?\r\n\r\nIf you prefer EXCHANGE instead of paid linking, we may get you featured on any of any of the following websites:\r\n\r\necommercefastlane.com (DR:71, Traffic:80.6K)\r\ncoolbio.org (DR:64, Traffic:102K)\r\nvyvymangaa.us (DR:48, Traffic:135K)\r\n\r\nYou won\'t have to link back to the same website but some other one.\r\n\r\nThis is called 3-way link exchange, the safest link building method works today.\r\n\r\nWe\'ve over 8K+ sites in our inventory with real organic traffic, if you want to look for more options for exchange.\r\n\r\nIf you\'re interested, please feel free to contact me via email at sebmarketer@gmail.com\r\n\r\nBest of Regards', '2024-05-24 07:27:19'),
(201, 'Mike Watson\r\n', 'mikeSeapows@gmail.com', '87215547483', 'Greetings \r\n \r\nThis is Mike Watson\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictly-digital.com/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your bistbilisim.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictly-digital.com/semrush-backlinks/ \r\n \r\nCheap and effective \r\nWhatsapp us: https://wa.link/on3cru \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Watson\r\n \r\nmike@strictlydigital.net', '2024-05-26 22:04:43'),
(202, 'Mike Thorndike\r\n', 'mikeroda@gmail.com', '84873814394', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkey-digital.com/affiliates/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Thorndike\r\n \r\nMonkey Digital', '2024-05-27 02:57:30'),
(203, 'Jones', 'emilyjones2250@gmail.com', '119163079', 'Hi there,\r\n\r\nWe run a Youtube growth service, where we can increase your subscriber count safely and practically. \r\n\r\n- Guaranteed: We guarantee to gain you 700-1500 new subscribers each month.\r\n- Real, human subscribers who subscribe because they are interested in your channel/videos.\r\n- Safe: All actions are done, without using any automated tasks / bots.\r\n\r\nOur price is just $60 (USD) per month and we can start immediately.\r\n\r\nIf you are interested then we can discuss further.\r\n\r\nKind Regards,\r\nEmily', '2024-05-28 03:48:14'),
(204, 'FlcvJSPbA', 'plummer_denarius1996@yahoo.com', '4548043830', 'lKCwMfeI', '2024-05-30 13:33:54'),
(205, 'LMgKAtsZBVkChaX', 'plummer_denarius1996@yahoo.com', '6672913383', 'pDPHrEgtvFOWINe', '2024-05-30 13:33:56'),
(206, 'Stewart', 'noreplyhere@aol.com', '342-123-4456', 'Want Your Ad Everywhere? Reach Millions Instantly! For less than $100 I can blast your message to website contact forms globally. Contact me via skype or email below for info\r\n\r\nPhil Stewart\r\nEmail: gmpk9u@submitmaster.xyz\r\nSkype: form-blasting', '2024-06-01 22:46:49'),
(207, 'Burnside', 'burnside.catalina@gmail.com', '7872746826', 'Hi,\r\n\r\nThere\'s a new AI tool that lets you create and sell eBooks and FlipBooks in over 100 languages. It sounds like a dream come true, right? Our tool uses AI to help you generate content for eBooks on a variety of topics. Great for saving time if you\'re short on ideas or writing skills.\r\n\r\nCreate eBooks and FlipBooks in various formats (think kids\' books, puzzles, crosswords).\r\nGenerate content in a vast range of languages.\r\nEmbed affiliate links for potential income.\r\nAutomate parts of the creation process.\r\n\r\nIf you\'re interested in creating eBooks but need help with content generation, this tool could be a valuable asset. Just be realistic about the effort involved and don\'t expect overnight success.\r\n\r\nFind out more here: https://furtherinfo.org/wx9n\r\n\r\nThanks,\r\n\r\nCatalina', '2024-06-04 07:51:22'),
(208, 'qHQWoZGiveIFmfOU', 'michele.villasmil9245@yahoo.com', '6324223849', 'FedRMkKNv', '2024-06-04 10:38:47'),
(209, 'uWrKLQRdg', 'michele.villasmil9245@yahoo.com', '2918030051', 'DQeLtqCor', '2024-06-04 10:39:01'),
(210, 'Stoate', 'stoate.dominga@yahoo.com', '780-879-1279', 'You may wish to save this email for future reference.  There is no need to unsubscribe because this is a one-time email from Se-REM.  This announcement is a public service for a not-for-profit program that has saved and restored lives shattered by abuse and trauma.\r\n  \r\n     Have you heard of Se-REM? (Self effective - Rapid Eye Movement). Many people don\'t know that REM brain activity dramatically improves the processing of traumatic emotion. It creates peace and empowers the listener. Se-REM is an advanced version of EMDR therapy. It is more powerful because it combines elements of 6 different therapies, EMDR, hypnosis, mindfulness, Gestalt child within work, music therapy, and Awe therapy,(connecting profoundly with nature).\r\n \r\n     It has helped thousands of people overcome PTSD, and anxiety. But it is also helpful in a great many situations, loss of any kind, grief, phobias and even marital counseling. The mission statement is &quot;Trauma relief at as close to free as possible&quot;. This program downloads to a smart phone or computer and can be used in an office or at home. Read about it, hear samples, and download at: Se-REM.com. Once you own the program, you are encouraged to give it away to others who will benefit. I provide free consultation to all who use the program. \r\nSe-REM.com has a 95% rating on Trustpilot and is in use in 33 countries.\r\n \r\n     If you would like to know more you can watch a UK Podcast at: https://lockedupliving.podbean.com', '2024-06-06 17:05:03'),
(211, 'TGPkLpQHDlAdzU', 'roy75griswold03t@outlook.com', '9893397363', 'djiUfXWSRNKTomO', '2024-06-07 21:18:47'),
(212, 'SvbxBtmcwkLD', 'roy75griswold03t@outlook.com', '6358736326', 'SXUVpsJtk', '2024-06-07 21:19:33'),
(213, 'Index', 'submissions@searchindex.site', '51847686', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domainsubmit1.pro', '2024-06-08 21:36:05'),
(214, 'ITXjFDYdtCGflEL', 'ryan_quatch140860@yahoo.com', '8415324062', 'EzBLNQnZWxA', '2024-06-10 23:07:59'),
(215, 'nvmkYzHRqf', 'ryan_quatch140860@yahoo.com', '8455228903', 'DukgLTqa', '2024-06-10 23:08:09'),
(216, 'Millard', 'reyes@bistbilisim.com', '448944593', 'Good day \r\n\r\nThe New Powerful LED Flashlight is The Perfect Flashlight For Any Situation!\r\n\r\nThe 3,000 Lumens &amp; Adjustable Zoom gives you the wide field of view and brightness other flashlights don’t have.\r\n\r\n50% OFF + Free Shipping!  Get it Now: https://linterna.cc\r\n\r\nBest Wishes, \r\n\r\nReyes', '2024-06-12 11:04:03'),
(217, 'Riggs', 'joannariggs278@gmail.com', '26997278', 'Hi,\r\n\r\nI just visited bistbilisim.com and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nOur videos cost just $195 for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna', '2024-06-13 18:08:53'),
(218, 'thyFfgHDkV', 'johnson7068oIz@outlook.com', '6929888372', 'lPmuUJhfQYD', '2024-06-14 08:42:25'),
(219, 'VWFqHvhADufQyLrS', 'johnson7068oIz@outlook.com', '6554228025', 'ohdOAKZElR', '2024-06-14 08:42:35'),
(220, 'Salomons', 'eddy.salomons27@gmail.com', '644345676', 'Hi, \r\n\r\nStruggling to reach more customers and boost your sales in the competitive online market?\r\n\r\nWithout a user-friendly and attractive e-commerce website, you might be missing out on significant opportunities to grow your business and enhance your brand visibility.\r\n\r\nAt OutsourceBPO, we create stunning, custom e-commerce websites designed to meet your unique business needs. Here\'s how we can help:\r\n\r\n- **Custom Design:** Reflects your brand’s identity.\r\n- **User-Friendly:** Easy navigation on all devices.\r\n- **Essential Features:** Secure checkout, customer accounts, and more.\r\n- **SEO &amp; Marketing:** Optimized and integrated to drive sales.\r\n- **Ongoing Support:** Continuous maintenance and updates.\r\n- **Affordable Pricing:** Packages to fit your budget.\r\n\r\nLet’s schedule a free consultation to discuss your goals and how we can help you achieve them. Visit https://outsource-bpo.com/website/?bistbilisim.com for more details .\r\n\r\nBest regards,\r\nSam', '2024-06-14 20:25:51'),
(221, 'Brown', 'ameliabrown0325@gmail.com', '660301004', 'Hi there,\r\n\r\nWe run a Youtube growth service, where we can increase your subscriber count safely and practically. \r\n\r\n- Guaranteed: We guarantee to gain you 700-1500 new subscribers each month.\r\n- Real, human subscribers who subscribe because they are interested in your channel/videos.\r\n- Safe: All actions are done, without using any automated tasks / bots.\r\n\r\nOur price is just $60 (USD) per month and we can start immediately.\r\n\r\nIf you are interested then we can discuss further.\r\n\r\nKind Regards,\r\nAmelia\r\n\r\nUnsubscribe: https://removeme.click/yt/unsubscribe.php?d=bistbilisim.com', '2024-06-15 04:23:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `source` varchar(7) COLLATE utf8_turkish_ci NOT NULL,
  `doc` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `documents`
--

INSERT INTO `documents` (`id`, `source`, `doc`) VALUES
(3, 'banner', ''),
(4, 'cv', '46999315662349094612898847860099205604437256996519494047623396972371517759134822535487256732967'),
(5, 'cv', '46225209947173886942865143779968714067426658142051890356029159883921425067723729374270560669999'),
(6, 'cv', '33531034458494391501703088878291820005188272200032484182823986474111802965564859549807030973243'),
(7, 'cv', '30994966705049450971738915191689739448249944879267768858414733410327821463682928358791710888260'),
(10, 'profile', '37218350651967838514760017902123085390347942628766626360748158752894587859483987350511310876092.jpg'),
(12, 'cv', '45142275461859476073048055075219188225420444395801526640335293674580167051384000299999379839231'),
(14, 'profile', '22613775679426172873039313735544263872168386104151243718347606924227313122181924929861712791544.jpg'),
(15, 'profile', '28930035773816126901226060018033548086363643982809840419022058151944054351402543938801224221835.jpg'),
(16, 'banner', '35158901450223101753849852098480894529344034828900753835027876086076172961793240306057841003003');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gallery`
--

INSERT INTO `gallery` (`id`, `name`) VALUES
(48, '25680688150420478942343054530610977172215057452213371970438725572977150908951921557122245965353.jpg'),
(50, '25278685005189460913750787826206077494434275626857921786522950320489727736131153525217792848137.png'),
(53, '40524048736889888354716400570805222449433066867047449934324735943578470853943234044935433245488.png'),
(54, '46498877752770657393836265026746987748200738098330517600215647610686362765211952233582193882764.png'),
(55, '40306462594495446103948875855187524698304789218749796486833565750581922333374430792513006537926.png'),
(56, '11801888599672449392249921619709452489254938936178229597544568692842061811811530132470953299928.png'),
(58, '21406209032348418722236585072587884555328491677878473430619037679068857496813116436435223001758.png'),
(59, '12481321550880858832974294966848282622330398976786093122041365519440505235104512475650665520535.png'),
(60, '49408955118604604441578635714957481915398756786447474841212690909855502783234996044054515434002.jpg'),
(61, '32109606545717551852155848290255636110357159550003937776812519604918452749562616902925868781040.jpg'),
(62, '36226873193149619441783820696505288892295266726636570293736429996821231777323528211639590094776.jpg'),
(63, '23647492391289181233283585453934999758299554537789567730231632367453571862894979595070541887648.jpg'),
(65, '24994566742397655003583833305557373028115678198112372667243496110916096201522899388851504557643.jpg'),
(66, '33081181620354772893031332733911873345333994872176525406344675968051432059661983195168967913576.jpg'),
(67, '39195983936351549384515578865059593733152903779902291158714705561577436694244377891420175197321.jpg'),
(68, '43114872971223195711896884514312969905422770926184554654239067114186970808902224521399836224592.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `name_surname` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `domain` text COLLATE utf8_turkish_ci NOT NULL,
  `class` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `img` text COLLATE utf8_turkish_ci NOT NULL,
  `banner` text COLLATE utf8_turkish_ci NOT NULL,
  `cv` text COLLATE utf8_turkish_ci NOT NULL,
  `about` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `social` text COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `language` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `history`
--

INSERT INTO `history` (`id`, `user_id`, `username`, `pass`, `name_surname`, `domain`, `class`, `img`, `banner`, `cv`, `about`, `social`, `email`, `language`, `date`) VALUES
(119, 78, 'saraserg', '2aoP3X', 'Semih Aras Ergurum', 'saraserg.bistbilisim.com', '12/B', '27002005624010956172916465223507711523371965734401346652417263922612144366542842218196954081113.jpg', '', '', '', '', '', '', '2023-07-20 16:21:28'),
(120, 99, 'HokageBanana', 'spider2005', 'Mohamad Sawan', 'mohamad1.bistbilisim.com', '12/B', 'default-student.png', '', '', '', 'insta: hokage_banana', 'mohamadsawan2005@gmail.com', 'python,c++,c#,java,javascript,html,css', '2023-07-24 21:21:28'),
(121, 89, 'insane', '131718', 'Nidanur Karahalil', 'insane.bistbilisim.com', '12/B', 'default-student.png', '', '', '', '', '', '', '2023-09-25 06:14:57'),
(122, 89, 'insane', '131718', 'Nidanur Karahalil', 'insane.bistbilisim.com', '12/B', '37218350651967838514760017902123085390347942628766626360748158752894587859483987350511310876092.jpg', '', '', '', '', '', '', '2023-09-25 06:40:27'),
(123, 89, 'Nidanur', '131718', 'Nidanur Karahalil', 'insane.bistbilisim.com', '12/B', '37218350651967838514760017902123085390347942628766626360748158752894587859483987350511310876092.jpg', '', '', '', '', '', '', '2023-09-25 07:31:56'),
(124, 89, 'Nidanur', '131718', 'Nidanur Karahalil', 'insane.bistbilisim.com', '12/B', '27315512090918961541426436209264185729231535411348653940322314703247252372141423625334982177905.png', '', '', '', '', '', '', '2023-10-23 06:43:12'),
(125, 86, 'menestkn', 'XcFE123', 'Muhammed Enes Aytekin', 'menestkn.bistbilisim.com', '12/B', 'default-student.png', '', '', '', '', '', '', '2024-02-10 20:01:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `baslik` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `alt_baslik` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `metin` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `resim` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `link` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `kategori` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `yazar` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `keywords` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `tiklanma` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `baslik`, `alt_baslik`, `metin`, `resim`, `link`, `kategori`, `yazar`, `tarih`, `description`, `keywords`, `tiklanma`) VALUES
(1, '1. GENÇLİK FESTİVALİ', 'Bu sene ilkini düzenlediğimiz Gençlik Festivalinde öğrencilerimiz gün boyu eğlenceli vakitler geçirdiler. ', 'Bu sene ilkini düzenlediğimiz Gençlik Festivalinde öğrencilerimiz gün boyu eğlenceli vakitler geçirdiler. Etkinlikte çeşitli ödüllü yarışmalar, takı tasarımı, kara kalem, ebru ve hat sanatları atölyeleri, Pars Robotic takımımızın otonom araç gösterisi yer alırken öğrenciler gün boyu öğrencilerimizin dj performanslarıyla halaylar çekip oyunlar oynadılar. Etkinlikte emeği geçen öğretmen ve öğrencilerimize teşekkürlerimizi sunarız.', '24887721222311319594111682469337292313439274053474466303140486765545944008021811356444467153196.jpg', '1-genclik-festivali', 'Genel', 'Yılmaz Ilışık', '2024-06-15 07:32:08', 'Bu sene ilkini düzenlediğimiz Gençlik Festivalinde öğrencilerimiz gün boyu eğlenceli vakitler geçirdiler.', 'Gençlik Festivalinde ', 311),
(2, '2022-2023 EĞİTİM ÖĞRETİM DÖNEMİ BİLİŞİM TEKNOLOJİLERİ ALANI SORUMLULUK SINAVI DUYURUSU', '2022-2023 EĞİTİM ÖĞRETİM DÖNEMİ BİLİŞİM TEKNOLOJİLERİ ALANI SORUMLULUK SINAVI DUYURUSU', 'Bilişim Teknolojileri Alanı \"İşletmelerden Becere Eğitimi Dersi (STAJ)\" Sorumluluk sınavı 12/06/2023 tarihinde saat 11:00\'da okulumuzda yapılacaktır. Sınav için okula gelecek öğrencilerin Bilişim Teknoloji Bölümüne gitmeleri gerekmektedir.', '37575814056815417041921616420640099554456886419281613475439880358319255910874326352355918790498webp', '2022-2023-egitim-ogretim-donemi-bilisim-teknolojileri-alani-sorumluluk-sinavi-duyurusu', 'Duyuru', 'Yılmaz Ilışık', '2024-06-15 07:32:08', 'Bilişim Teknolojileri Alanı ', 'Bilişim Teknolojileri Alan, staj', 330),
(4, 'Bist Bilişim Öğrenciler İçin Yenileniyor !', 'Bist Bilişim İnternet Sitesinde Artık Öğrencilerede Yer Açıyoruz !', 'Artık internet sitemizi bölümümüzde bulunan öğrenciler için yardımcı olmasını sağlayacak yenilikler getirmeye çalışıyoruz. Bu yenilikler internette sayfamız ile birlikte öğrencininde öne çıkarılmasını ve keşfedilmesini sağlamaktadır. Şu anda öğrencilerin kendilerini istedikleri gibi tanıtmaları için aşağıdaki güncellenip , silinebilen bölümler bulunmaktadır : \r\n\r\n· Profil Fotoğrafı\r\n· Banner Fotoğrafı\r\n· CV Dosyası\r\n· İnternet Sitesi\r\n· Sosyal Medya\r\n· E-Mail\r\n· Bilinen Programlama Dilleri\r\n· Hakkında\r\n· Kullanıcı Adı\r\n· Şifre\r\n· Ad Soyad\r\n\r\nBunlar şu anda sayfada öğrenciler için eklediğimiz yeniliklerdir. Yakında belli bir MB sınırına bağlı istediğiniz dosyayı yükleyebileceğiniz bir güncelleme yayınlayacağız.\r\nBu güncelleme sayesinde öğrencilerimiz. Flash Disk gibi kaybolabilecek veya çalınabilecek bir eşyayı okula getirmek yerine bilgilerinizi saklayabileceğiniz özel bir dosyalar bölümü getireceğiz. İstediğiniz dosyaların profilinize görünüp , görünmemesine karar verebileceksiniz..\r\n\r\n<img src=\"/../img/slider/19389108139172478372362688348982041765227669050852350836026926962333257248172078309426127137380.png\">\r\n\r\nÖğrenciler dışında Bist Bilişim İnternet Sitesi ile ilgili ise artık sayfanın tamamı yenilendi ve içerik eklenebilir hale getirildi. Bu sayede okulumuzun Bilişim Teknolojileri Bölümü ile ilgili en yeni içeriklere anında ulaşabileceksin. Yakında haberler bölümünde de güncelleme yapacağız ve artık bildirimlerimiz sayesinde sayfamızla ilgili içerikleri kaçırmamış olacaksın..\r\n\r\n\r\nEğer sende bizim öğrencilerimizden biriysen Kullanıcı Adı ve Şifre bilgilerin ile buradan giriş yapabilirsin https://bistbilisim.com/admin/\r\n\r\nİyi Günler Borsa İstanbul\'lu', '35586892681662228602061676627376576618455744150463994552237137390263169887843124395174509787915.png', 'bist-bilisim-ogrenciler-icin-yenileniyor', 'Duyuru', 'Ömer İslamoğlu', '2024-06-15 07:31:58', 'Bist Bilişim İnternet Sitesinde Artık Öğrencilerede Yer Açıyoruz !', 'Bist Bilişim , öğrenciler , Bilişim Teknolojileri , Bilişim Teknolojileri Bölümü , Borsa İstanbul Mesleki ve Teknik Anadolu Lisesi , bist mtal bilişim , bist mtal', 467);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_slider`
--

CREATE TABLE `news_slider` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news_slider`
--

INSERT INTO `news_slider` (`id`, `name`) VALUES
(6, '15376333909003412983668806773441900777114558577826455019722145894782788608962998440826465922392.jpg'),
(8, '38822209910785553293338108579403815750184510471883978520921575289990796946604260401384387696384.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` text COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `text` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `button` varchar(2048) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `img`, `title`, `text`, `button`) VALUES
(11, '23002438126002312712361431877088336640363097939864365465728808221710422951131971818874115958292.png', 'ㅤ', '', 'https://www.bistbilisim.com/news/p/bist-bilisim-ogrenciler-icin-yenileniyor'),
(13, '19389108139172478372362688348982041765227669050852350836026926962333257248172078309426127137380.png', '', '', 'https://bistbilisim.com/news/p/bist-bilisim-ogrenciler-icin-yenileniyor'),
(14, '27855871079463310101030356657458725491223651818266814606145473720536941323714429193209954159597.png', 'Bist Bilişim', 'BIST MTAL Bilişim Teknolojileri Bölümü İnternet Sitesi', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `name_surname` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `domain` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `class` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `img` text COLLATE utf8_turkish_ci NOT NULL,
  `banner` text COLLATE utf8_turkish_ci NOT NULL,
  `cv` text COLLATE utf8_turkish_ci NOT NULL,
  `about` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `social` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `language` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`id`, `username`, `pass`, `name_surname`, `domain`, `class`, `img`, `banner`, `cv`, `about`, `social`, `email`, `language`, `registration_date`) VALUES
(0, 'TrinsyCa', 'xo_zIsx%5W%$1406//', 'Ömer İslamoğlu', 'trinsyca.com', 'Mezun', '31487543419273319601513073889294341675182870680794000170333480626656507257582021324729069969576.jpg', '15087282300790176362573942550101124846289775261058416460118873848034802328652020777872926221040.jpg', '27235514337828990374035131464394978378443478008956735897549166217912944794283978452764002648205', 'YTÜ Teknopark - KLE Bilgi Teknolojileri\'nde Stajyer.\r\n\r\nBlog Sayfam\r\nhttps://blog.trinsyca.com\r\n\r\nHakkımda\r\nhttps://bio.trinsy.ca', 'instagram.com/trinsyca', 'omerislamoglu1905@gmail.com', 'Laravel , Docker , PHP , JavaScript , CSS , C# , Python , MYSQL', '2024-06-19 11:29:09'),
(76, 'quarder', '3FQDow', 'Emre Çiçek', 'quarder.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(78, 'saraserg', '2aoP3X', 'Semih Aras Ergurum', 'saraserg.bistbilisim.com', 'Mezun', '27002005624010956172916465223507711523371965734401346652417263922612144366542842218196954081113.jpg', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(79, 'omertarik', 'cz1zXG', 'Ömer Tarık Dilaver', 'omertarik.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(80, 'yebusa', 'QPH81x', 'Yusuf Buğra Bulur', 'yebusa.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(81, 'ihsangokturk', 'h3qZAP', 'İhsan Muhammet Göktürk', 'ihsangokturk.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(82, 'aenes', 'kdSzRA', 'Ali Enes', 'aenes.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(83, 'erayk', 'eswjkL', 'Eray Kör', 'erayk.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(84, 'eanil', 'PfpiSD', 'Erdal Anıl Alkan', 'eanil.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(86, 'menestkn', 'XcFE123', 'Muhammed Enes Aytekin', 'menestkn.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(87, 'hkt', 'xwnxa7', 'Muhammet Hüseyin Kurt', 'hkt.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(88, 'mtalha', '3Jpsrv', 'Muhammed Talha Topuz', 'mtalha.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(89, 'Nidanur', '131718', 'Nidanur Karahalil', 'insane.bistbilisim.com', 'Mezun', '27315512090918961541426436209264185729231535411348653940322314703247252372141423625334982177905.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(90, 'damlamubin', 'QzIh1t', 'Damla Mübin', 'damlamubin.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(91, 'ebubekir', 'Vorugl', 'Ebubekir Sur', 'ebubekir.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(92, 'saidaydan', 'w8Oyan', 'Said Aydan', 'saidaydan.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(93, 'ozyilmaz', '4nxBnV', 'Barış Özyılmaz', 'ozyilmaz.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(94, 'esmanurkusku', 'eMWFNu', 'Esmanur Kuşku', 'esmanurkusku.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(95, 'yusufk', 'tDjfpQ', 'Yusuf Kırdar', 'yusufk.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(96, '', 'U5DSnW', 'Esma Gedikoğlu', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(97, 'mda', '17DrAY', 'Mehmet Deniz Ay', 'mda1.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(98, 'saydeniz', 'T7hCpr', 'Sefa Aydeniz', 'saydeniz.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:29:09'),
(99, 'HokageBanana', 'spider2005', 'Mohamad Sawan', 'mohamad1.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', 'instagram.com/hokage_banana', 'mohamadsawan2005@gmail.com', 'python,c++,c#,java,javascript,html,css', '2024-06-19 11:29:09'),
(100, 'bilalkaradeniz', '1QDC4A', 'Bilal Karadeniz', 'bilalkaradeniz.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(101, '', 'qiP491', 'Efecan Acar', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(102, '', '9FOOEF', 'Emir Tuna Çelik', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(103, '', 'bp0sL3', 'Muhammed Eren Yılmaz', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(104, 'gramark', '3wdYh1', 'Ege Gültepe', 'gramark.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(105, '', 'VIZfIO', 'Muhammed Musa Aydeniz', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(106, '', 'iklB2O', 'Muhammed Ali Coşkun', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(107, '', 'xrbXLS', 'Mustafa Ozan Barin', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(108, '', 'bFy65S', 'Fahri Halit Saruhan', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(109, 'semihbk', 'LuawcU', 'Semih Burhanettin Karga', 'semihbk.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(110, '', 'AyjMnS', 'Yasir Tapar', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(111, 'yusufevni', 'ZrstSa', 'Yusuf Evni', 'yusufevni.bistbilisim.com', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(112, '', 'lilbjp', 'Yusuf Efe Çetintaş', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(113, '', 'ZVIsSG', 'Yusuf Kapkıner', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(114, '', 'z7KtPh', 'Mehmet Alp Arslan', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(115, '', 'uZmiLg', 'Özgür Buğra Arslan', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39'),
(116, '', 'uzDqs1', 'Bartu Şentürk', '', 'Mezun', 'default-student.png', '', '', '', '', '', '', '2024-06-19 11:31:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `fields` text COLLATE utf8_turkish_ci NOT NULL,
  `social` text COLLATE utf8_turkish_ci NOT NULL,
  `img` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teachers`
--

INSERT INTO `teachers` (`id`, `name_surname`, `fields`, `social`, `img`) VALUES
(26, 'Selma Özgenç', 'Nesne Tabanlı Programlama , Mobil Uygulamalar', 'https://www.linkedin.com/in/selma-%C3%B6zgen%C3%A7-6a4913211/', '42101193139503214502576835065955062720177749747746717997340206567990650652161732302003869698521.jpg'),
(27, 'Yılmaz Ilışık', 'Web Tabanlı Programlama', 'https://www.linkedin.com/in/y%C4%B1lmaz-ili%C5%9Fik-35453165/?originalSubdomain=tr', '27843046312884853651408336317907289649179506737828454807723621872520085085041864040439104350809jpeg'),
(28, 'Yeşim Karakuş', 'Robotik Kodlama , Mikrodenetleyici', 'https://www.linkedin.com/in/ye%C5%9Fim-karaku%C5%9F-2b675527b/?originalSubdomain=tr', '28112000082269599413106794241684812371134595153707376507735661071696613323482666367021810558519jpeg'),
(29, 'Rahman Çürüttü', 'Nesne Tabanlı Programlama , Mobil Uygulamalar', 'https://www.linkedin.com/in/rahman-%C3%A7%C3%BCr%C3%BCtt%C3%BC-655797a4/', 'default-teacher.png'),
(30, 'Mustafa Cömert', 'Grafik ve Canlandırma', '', 'default-teacher.png'),
(31, 'Mehmet Can Kaya', 'Bilişim Teknolojileri Temelleri', '', 'default-teacher.png'),
(32, 'Serkan Arslan', '', '', 'default-teacher.png'),
(33, 'Fatih Okur', '', '', 'default-teacher.png'),
(34, 'Duygu Köseoğlu', '', '', 'default-teacher.png'),
(35, 'Yasemin Taylan', '', '', 'default-teacher.png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news_slider`
--
ALTER TABLE `news_slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- Tablo için AUTO_INCREMENT değeri `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `news_slider`
--
ALTER TABLE `news_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
