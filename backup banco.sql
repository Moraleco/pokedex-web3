PGDMP         )                {            crud-pokemon    13.10    13.10 6    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    17108    crud-pokemon    DATABASE     n   CREATE DATABASE "crud-pokemon" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE "crud-pokemon";
                postgres    false            �            1259    17306    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    17304    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    206            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    205            �            1259    17277 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    17275    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    201            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    200            �            1259    17296    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    17320    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    17318    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    208            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    207            �            1259    17345    pokemons    TABLE     J  CREATE TABLE public.pokemons (
    id bigint NOT NULL,
    nome character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    nivel integer NOT NULL,
    foto character varying(255) NOT NULL,
    treinador_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.pokemons;
       public         heap    postgres    false            �            1259    17343    pokemons_id_seq    SEQUENCE     x   CREATE SEQUENCE public.pokemons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.pokemons_id_seq;
       public          postgres    false    212            �           0    0    pokemons_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.pokemons_id_seq OWNED BY public.pokemons.id;
          public          postgres    false    211            �            1259    17334    treinadores    TABLE       CREATE TABLE public.treinadores (
    id bigint NOT NULL,
    nome character varying(255) NOT NULL,
    cidade character varying(255) NOT NULL,
    foto character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.treinadores;
       public         heap    postgres    false            �            1259    17332    treinadores_id_seq    SEQUENCE     {   CREATE SEQUENCE public.treinadores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.treinadores_id_seq;
       public          postgres    false    210                        0    0    treinadores_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.treinadores_id_seq OWNED BY public.treinadores.id;
          public          postgres    false    209            �            1259    17285    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    17283    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    203                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    202            L           2604    17309    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    206    206            J           2604    17280    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    200    201            N           2604    17323    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    208    208            P           2604    17348    pokemons id    DEFAULT     j   ALTER TABLE ONLY public.pokemons ALTER COLUMN id SET DEFAULT nextval('public.pokemons_id_seq'::regclass);
 :   ALTER TABLE public.pokemons ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    212    212            O           2604    17337    treinadores id    DEFAULT     p   ALTER TABLE ONLY public.treinadores ALTER COLUMN id SET DEFAULT nextval('public.treinadores_id_seq'::regclass);
 =   ALTER TABLE public.treinadores ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            K           2604    17288    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203            �          0    17306    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    206   �@       �          0    17277 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    201   �@       �          0    17296    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    204   hA       �          0    17320    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    208   �A       �          0    17345    pokemons 
   TABLE DATA           e   COPY public.pokemons (id, nome, tipo, nivel, foto, treinador_id, created_at, updated_at) FROM stdin;
    public          postgres    false    212   B       �          0    17334    treinadores 
   TABLE DATA           U   COPY public.treinadores (id, nome, cidade, foto, created_at, updated_at) FROM stdin;
    public          postgres    false    210   :D       �          0    17285    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    203   �D                  0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    205                       0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);
          public          postgres    false    200                       0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    207                       0    0    pokemons_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.pokemons_id_seq', 22, true);
          public          postgres    false    211                       0    0    treinadores_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.treinadores_id_seq', 5, true);
          public          postgres    false    209                       0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 1, true);
          public          postgres    false    202            Z           2606    17315    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    206            \           2606    17317 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    206            R           2606    17282    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    201            X           2606    17303 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    204            ^           2606    17328 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    208            `           2606    17331 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    208            e           2606    17353    pokemons pokemons_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.pokemons
    ADD CONSTRAINT pokemons_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.pokemons DROP CONSTRAINT pokemons_pkey;
       public            postgres    false    212            c           2606    17342    treinadores treinadores_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.treinadores
    ADD CONSTRAINT treinadores_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.treinadores DROP CONSTRAINT treinadores_pkey;
       public            postgres    false    210            T           2606    17295    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    203            V           2606    17293    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    203            a           1259    17329 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    208    208            f           2606    17354 &   pokemons pokemons_treinador_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pokemons
    ADD CONSTRAINT pokemons_treinador_id_foreign FOREIGN KEY (treinador_id) REFERENCES public.treinadores(id);
 P   ALTER TABLE ONLY public.pokemons DROP CONSTRAINT pokemons_treinador_id_foreign;
       public          postgres    false    2915    210    212            �      x������ � �      �   �   x�]��� E��cC�还�P:&*�`�}�&}8��:'g�3�,H���2��xgA�C䎔ق�_^����%=xZž�g���ī�EqOÊ�o;�t�?i�>��j����jCn1+�L�rPJ}X4Nb      �   q   x���/J�IM�w(I-.I�K���T1�T14P	�I	���J�����(s���/�N*��Nr/�-t*3�r��LO���IM����4202�50�50Q04�21�25����� ]�      �      x������ � �      �   $  x�u�Mn�0���)z��᯸k�&h�$�l�HQ�(fJK�]��EOዕ�BYV���Û7?H>=���6eȥ�=�H#����uSG�3�Θ���EmAiʢ���b�UM�7#G��R� ��~T�-J+ �Q9�ֿ\(GO0#Xƙ,�QE���m]�Up/n2���9��XX�s�d�~vO�����a�phT	��LoCf5��E�ܻ�9H�rTX-SKX�Ԑ�j��X|2fL��X�&�тܺ���6����Yl���4��&F.�m�z�p�9��.v�s�c(�ʷ�'7޻҇�O��ٱ�����(p�z#������4B�m6V��FA��օ]��ibq�c�8/f�T�/�^.( ��|ٕYUe8���0^�2 3�KX)h<�!�ݔX2&��]h�D�s�F0�x�	��ѱ��F�F�\>�{�ܯp�����Qq<A3V.�4
����f��=>�KW� �y�F��E ���p8�Ln{�R��ޤQ�~��7?۷����I����٥�7.A�7�v�hΊ�0�^zwN)��3f      �   �   x�mϿ�0����� ���M���مh�?��`o/$:@�~���/�ݽ����}� �Rʂ��٣�B�9�hR�	�C��ƚbX���	��}�+�bD!r���4l�0$�j�����2VK�6s���(����27�M:b�8ֱ�V�mf���r�t�hi��S���.�N�      �   {   x�3���/J�IM��̅2JR�KR���s9c�8U�*UTJ+�s���*��s�3R�"��}�J�JӼ=�
݋-s�-]�2�|�̼�#\���<J�@����u�tLL�����W� �(     