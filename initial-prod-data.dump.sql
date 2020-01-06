--
-- PostgreSQL database dump
--

-- Dumped from database version 12.0
-- Dumped by pg_dump version 12.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;


--
-- Data for Name: tlt_category; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_category (id, shortname, longname) FROM stdin;
8	POO	Programmation Orientée Objet
9	PHP	Langage PHP
10	Symf4	Symfony version 4
11	Musique	Lexique sur la musique
\.


--
-- Data for Name: tlt_question; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_question (id, categories_id, text, created_at, updated_at) FROM stdin;
8	9	Que veux dire l'acronyme PHP	2019-12-16 08:10:31	2019-12-16 08:10:31
11	8	testest	2019-12-16 11:09:44	2019-12-16 11:09:44
13	11	Quel est l'acronyme des battements par minute	2019-12-19 11:52:30	2019-12-19 11:52:30
14	11	Comment appelle-t-on la mélodie principale d'un morceau ?	2019-12-19 11:53:46	2019-12-19 11:53:46
15	11	Que veux dire l'acronyme EDM	2019-12-19 11:55:18	2019-12-19 11:55:18
\.


--
-- Data for Name: tlt_answer; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_answer (id, text, correction, question_id) FROM stdin;
6	Hypertext Preprocessor	1	8
7	Phonetique Hotmail Processor	0	8
8	Phonetique Hewlett-Packard	0	8
13	456	1	11
14	123	0	11
15	MPB	0	13
16	BPM	1	13
17	b/M	0	13
18	Un lead	1	14
19	Une top-line	0	14
20	Une arp	0	14
21	Electro Dans la Musique	0	15
22	Education Direct Musical	0	15
23	Electro Dance Music	1	15
\.


--
-- Data for Name: tlt_user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_user (id, email, roles, password) FROM stdin;
7	superadmin@gmail.com	["ROLE_SUPER_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU
8	admin@gmail.com	["ROLE_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU
9	user@gmail.com	["ROLE_USER"]	$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU
\.


--
-- Name: tlt_answer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_answer_id_seq', 23, true);


--
-- Name: tlt_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_category_id_seq', 11, true);


--
-- Name: tlt_question_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_question_id_seq', 15, true);


--
-- Name: tlt_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_user_id_seq', 9, true);


--
-- PostgreSQL database dump complete
--

