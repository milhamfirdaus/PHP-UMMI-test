--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

-- Started on 2020-08-13 16:13:20

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 203 (class 1259 OID 24604)
-- Name: tb_mahasiswa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_mahasiswa (
    id_mahasiswa integer NOT NULL,
    nim character(10),
    nama_mahasiswa character varying(30),
    semester_masuk smallint,
    kode_kelas smallint,
    tahun_masuk smallint,
    id_prodi smallint,
    kode_jenjang smallint,
    nomor_urut character(3)
);


ALTER TABLE public.tb_mahasiswa OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 24602)
-- Name: tb_mahasiswa_id_mahasiswa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_mahasiswa_id_mahasiswa_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_mahasiswa_id_mahasiswa_seq OWNER TO postgres;

--
-- TOC entry 2834 (class 0 OID 0)
-- Dependencies: 202
-- Name: tb_mahasiswa_id_mahasiswa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_mahasiswa_id_mahasiswa_seq OWNED BY public.tb_mahasiswa.id_mahasiswa;


--
-- TOC entry 205 (class 1259 OID 24612)
-- Name: tb_prodi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_prodi (
    id_prodi integer NOT NULL,
    kode_prodi character(2),
    nama_prodi character varying(50)
);


ALTER TABLE public.tb_prodi OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 24610)
-- Name: tb_prodi_id_prodi_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_prodi_id_prodi_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_prodi_id_prodi_seq OWNER TO postgres;

--
-- TOC entry 2835 (class 0 OID 0)
-- Dependencies: 204
-- Name: tb_prodi_id_prodi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_prodi_id_prodi_seq OWNED BY public.tb_prodi.id_prodi;


--
-- TOC entry 2693 (class 2604 OID 24607)
-- Name: tb_mahasiswa id_mahasiswa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mahasiswa ALTER COLUMN id_mahasiswa SET DEFAULT nextval('public.tb_mahasiswa_id_mahasiswa_seq'::regclass);


--
-- TOC entry 2694 (class 2604 OID 24615)
-- Name: tb_prodi id_prodi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_prodi ALTER COLUMN id_prodi SET DEFAULT nextval('public.tb_prodi_id_prodi_seq'::regclass);


--
-- TOC entry 2826 (class 0 OID 24604)
-- Dependencies: 203
-- Data for Name: tb_mahasiswa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_mahasiswa (id_mahasiswa, nim, nama_mahasiswa, semester_masuk, kode_kelas, tahun_masuk, id_prodi, kode_jenjang, nomor_urut) FROM stdin;
126	1830425001	FAIZAL JARKASIH	5	2	2018	4	3	001
127	1841111102	SITI MARSITOH	1	1	2018	12	4	102
128	1830721006	ZAKIA ADITIA	1	2	2018	7	3	006
129	1830811121	SRI INDAH	1	1	2018	8	3	121
130	1832011031	MUHAMMAD RIDHO	1	1	2018	22	3	031
131	1831811036	NANDA PRIHANDANA	1	1	2018	17	3	036
132	1831027002	SELAMET MAULANA	7	2	2018	10	3	002
125	1841111073	ADAM NUGRAHA	1	1	2018	12	4	073
139	1530511032	MUHAMAD ILHAM FIRDAUS	1	1	2015	5	3	032
\.


--
-- TOC entry 2828 (class 0 OID 24612)
-- Dependencies: 205
-- Data for Name: tb_prodi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_prodi (id_prodi, kode_prodi, nama_prodi) FROM stdin;
1	01	TEKNIK SIPIL
2	02	KIMIA
3	03	AGRIBISNIS
4	04	AKUAKULTUR
5	05	TEKNIK INFORMATIKA
6	06	AKUNTANSI
7	07	ADMINISTRASI PUBLIK
8	08	ADMINISTRASI BISNIS
9	09	SASTRA INGGRIS
10	10	PENDIDIKAN BIOLOGI
12	11	KEPERAWATAN
13	12	PERPAJAKAN
14	13	PENDIDIKAN BAHASA DAN SASTRA INDONESIA
15	14	PENDIDIKAN MATEMATIKA
19	15	PENDIDIKAN JASMANI KESEHATAN DAN REKREASI
21	19	HUMAS
22	20	ILMU HUKUM
23	21	ILMU ADMINISTRASI
16	16	PENDIDIKAN GURU ANAK USIA DINI
17	18	PENDIDIKAN GURU SEKOLAH DASAR
18	17	PENDIDIKAN TEKNOLOGI INFORMASI
\.


--
-- TOC entry 2836 (class 0 OID 0)
-- Dependencies: 202
-- Name: tb_mahasiswa_id_mahasiswa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_mahasiswa_id_mahasiswa_seq', 139, true);


--
-- TOC entry 2837 (class 0 OID 0)
-- Dependencies: 204
-- Name: tb_prodi_id_prodi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_prodi_id_prodi_seq', 23, true);


--
-- TOC entry 2696 (class 2606 OID 24609)
-- Name: tb_mahasiswa tb_mahasiswa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_mahasiswa
    ADD CONSTRAINT tb_mahasiswa_pkey PRIMARY KEY (id_mahasiswa);


--
-- TOC entry 2698 (class 2606 OID 24617)
-- Name: tb_prodi tb_prodi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_prodi
    ADD CONSTRAINT tb_prodi_pkey PRIMARY KEY (id_prodi);


-- Completed on 2020-08-13 16:13:22

--
-- PostgreSQL database dump complete
--

