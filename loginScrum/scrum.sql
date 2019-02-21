--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3
-- Dumped by pg_dump version 10.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: miembro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.miembro (
    idmiembro integer NOT NULL,
    idproyecto integer NOT NULL,
    idusuario integer NOT NULL,
    idrol integer NOT NULL,
    estado character varying(3) NOT NULL,
    delete timestamp without time zone
);


ALTER TABLE public.miembro OWNER TO postgres;

--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.miembro_idmiembro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.miembro_idmiembro_seq OWNER TO postgres;

--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.miembro_idmiembro_seq OWNED BY public.miembro.idmiembro;


--
-- Name: permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permiso (
    idpermiso integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    valor character varying(3) NOT NULL
);


ALTER TABLE public.permiso OWNER TO postgres;

--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permiso_idpermiso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permiso_idpermiso_seq OWNER TO postgres;

--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permiso_idpermiso_seq OWNED BY public.permiso.idpermiso;


--
-- Name: proyecto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.proyecto (
    idproyecto integer NOT NULL,
    idusuario integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    fechainicio date NOT NULL,
    estado character varying(3) NOT NULL,
    delete timestamp without time zone,
    nombre character varying(20),
    ffinal date
);


ALTER TABLE public.proyecto OWNER TO postgres;

--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.proyecto_idproyecto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyecto_idproyecto_seq OWNER TO postgres;

--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.proyecto_idproyecto_seq OWNED BY public.proyecto.idproyecto;


--
-- Name: reunion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reunion (
    idreunion integer NOT NULL,
    idproyecto integer NOT NULL,
    fecha date NOT NULL,
    delete timestamp without time zone,
    nombre character varying(20)
);


ALTER TABLE public.reunion OWNER TO postgres;

--
-- Name: reunion_idreunion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reunion_idreunion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reunion_idreunion_seq OWNER TO postgres;

--
-- Name: reunion_idreunion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reunion_idreunion_seq OWNED BY public.reunion.idreunion;


--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rol (
    idrol integer NOT NULL,
    idpermiso integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    nombre character varying(20) NOT NULL
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- Name: rol_idrol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rol_idrol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rol_idrol_seq OWNER TO postgres;

--
-- Name: rol_idrol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rol_idrol_seq OWNED BY public.rol.idrol;


--
-- Name: sprint; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sprint (
    idsprint integer NOT NULL,
    idproyecto integer NOT NULL,
    descripcion character varying(250) NOT NULL,
    finicio date NOT NULL,
    delete timestamp without time zone,
    nombre character varying(20) NOT NULL,
    fechafinal date
);


ALTER TABLE public.sprint OWNER TO postgres;

--
-- Name: sprint_idsprint_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sprint_idsprint_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sprint_idsprint_seq OWNER TO postgres;

--
-- Name: sprint_idsprint_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sprint_idsprint_seq OWNED BY public.sprint.idsprint;


--
-- Name: tarea; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tarea (
    id integer NOT NULL,
    idsprint integer,
    nombre character varying(30),
    descripcion character varying(100),
    valor integer,
    estado integer
);


ALTER TABLE public.tarea OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    idusuario integer NOT NULL,
    nombre character varying(20) NOT NULL,
    apellido character varying(20) NOT NULL,
    username character varying(20) NOT NULL,
    correo character varying(20) NOT NULL,
    password character varying(20) NOT NULL,
    rutafoto character varying(200)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_idusuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_idusuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_idusuario_seq OWNER TO postgres;

--
-- Name: usuario_idusuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_idusuario_seq OWNED BY public.usuario.idusuario;


--
-- Name: miembro idmiembro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro ALTER COLUMN idmiembro SET DEFAULT nextval('public.miembro_idmiembro_seq'::regclass);


--
-- Name: permiso idpermiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso ALTER COLUMN idpermiso SET DEFAULT nextval('public.permiso_idpermiso_seq'::regclass);


--
-- Name: proyecto idproyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto ALTER COLUMN idproyecto SET DEFAULT nextval('public.proyecto_idproyecto_seq'::regclass);


--
-- Name: reunion idreunion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion ALTER COLUMN idreunion SET DEFAULT nextval('public.reunion_idreunion_seq'::regclass);


--
-- Name: rol idrol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol ALTER COLUMN idrol SET DEFAULT nextval('public.rol_idrol_seq'::regclass);


--
-- Name: sprint idsprint; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint ALTER COLUMN idsprint SET DEFAULT nextval('public.sprint_idsprint_seq'::regclass);


--
-- Name: usuario idusuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN idusuario SET DEFAULT nextval('public.usuario_idusuario_seq'::regclass);


--
-- Data for Name: miembro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.miembro (idmiembro, idproyecto, idusuario, idrol, estado, delete) FROM stdin;
\.


--
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permiso (idpermiso, descripcion, valor) FROM stdin;
\.


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.proyecto (idproyecto, idusuario, descripcion, fechainicio, estado, delete, nombre, ffinal) FROM stdin;
1	1	haciendo scrum	2018-02-13	1	\N	scrum	\N
2	1	hago un dato	2019-02-13	1	\N	datos	\N
3	1	estoy hacuendo pruebas	2019-02-13	1	\N	pruebas	\N
\.


--
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reunion (idreunion, idproyecto, fecha, delete, nombre) FROM stdin;
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rol (idrol, idpermiso, descripcion, nombre) FROM stdin;
\.


--
-- Data for Name: sprint; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sprint (idsprint, idproyecto, descripcion, finicio, delete, nombre, fechafinal) FROM stdin;
1	1	trabajos	2018-02-13	\N	pruebas	\N
2	1	kjdfhkj    \t\t	2019-02-13	\N	kfjghdk	2019-02-27
3	1	hago un elemento\t	2019-02-13	\N	elemento	2019-03-06
\.


--
-- Data for Name: tarea; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarea (id, idsprint, nombre, descripcion, valor, estado) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (idusuario, nombre, apellido, username, correo, password, rutafoto) FROM stdin;
1	cristian	Cadavid	nouliet	cristian@gmail.com	12345	../fotos/images.jpg
\.


--
-- Name: miembro_idmiembro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.miembro_idmiembro_seq', 1, false);


--
-- Name: permiso_idpermiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permiso_idpermiso_seq', 1, false);


--
-- Name: proyecto_idproyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.proyecto_idproyecto_seq', 3, true);


--
-- Name: reunion_idreunion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reunion_idreunion_seq', 1, false);


--
-- Name: rol_idrol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rol_idrol_seq', 1, false);


--
-- Name: sprint_idsprint_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sprint_idsprint_seq', 3, true);


--
-- Name: usuario_idusuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_idusuario_seq', 1, false);


--
-- Name: miembro miembro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT miembro_pkey PRIMARY KEY (idmiembro);


--
-- Name: permiso permiso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permiso
    ADD CONSTRAINT permiso_pkey PRIMARY KEY (idpermiso);


--
-- Name: proyecto proyecto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto
    ADD CONSTRAINT proyecto_pkey PRIMARY KEY (idproyecto);


--
-- Name: reunion reunion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT reunion_pkey PRIMARY KEY (idreunion);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (idrol);


--
-- Name: sprint sprint_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint
    ADD CONSTRAINT sprint_pkey PRIMARY KEY (idsprint);


--
-- Name: tarea tarea_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarea
    ADD CONSTRAINT tarea_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_correo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_correo_key UNIQUE (correo);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (idusuario);


--
-- Name: usuario usuario_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);


--
-- Name: rol fk_permiso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT fk_permiso FOREIGN KEY (idpermiso) REFERENCES public.permiso(idpermiso);


--
-- Name: miembro fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: sprint fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sprint
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: reunion fk_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reunion
    ADD CONSTRAINT fk_proyecto FOREIGN KEY (idproyecto) REFERENCES public.proyecto(idproyecto);


--
-- Name: miembro fk_rol; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_rol FOREIGN KEY (idrol) REFERENCES public.rol(idrol);


--
-- Name: miembro fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.miembro
    ADD CONSTRAINT fk_usuario FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);


--
-- Name: proyecto fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proyecto
    ADD CONSTRAINT fk_usuario FOREIGN KEY (idusuario) REFERENCES public.usuario(idusuario);


--
-- Name: tarea tarea_idsprint_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarea
    ADD CONSTRAINT tarea_idsprint_fkey FOREIGN KEY (idsprint) REFERENCES public.sprint(idsprint);


--
-- PostgreSQL database dump complete
--

