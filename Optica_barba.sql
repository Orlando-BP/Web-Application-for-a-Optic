PGDMP     3    7    
            y           optica_barba    13.2    13.2 3    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    33366    optica_barba    DATABASE     i   CREATE DATABASE optica_barba WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE optica_barba;
                RubenGG    false            �           0    0    DATABASE optica_barba    ACL       REVOKE ALL ON DATABASE optica_barba FROM "RubenGG";
GRANT CREATE,CONNECT ON DATABASE optica_barba TO "RubenGG";
GRANT TEMPORARY ON DATABASE optica_barba TO "RubenGG" WITH GRANT OPTION;
GRANT TEMPORARY ON DATABASE optica_barba TO "OrlandoBP" WITH GRANT OPTION;
                   RubenGG    false    3054            �            1255    139739    bajarestuche()    FUNCTION     �   CREATE FUNCTION public.bajarestuche() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
begin

update productos set cantidad = (cantidad-1) where nombre = 'Estuches';
return new;

end
$$;
 %   DROP FUNCTION public.bajarestuche();
       public          postgres    false            �            1255    139742    eliminarlentes()    FUNCTION     �   CREATE FUNCTION public.eliminarlentes() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
begin

delete from lentes where id_lentes = old.id_lentes;
return new;

end
$$;
 '   DROP FUNCTION public.eliminarlentes();
       public          postgres    false            �            1255    49580    mover_a_vendidos()    FUNCTION     �   CREATE FUNCTION public.mover_a_vendidos() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
declare begin
		insert into lentes_vendidos values (old.numeroproducto,old.marca,old.modelo,old.color,old.material,old.precio);
		return NULL;
end;
$$;
 )   DROP FUNCTION public.mover_a_vendidos();
       public          postgres    false            �            1255    49569    suma(integer, integer)    FUNCTION     ~   CREATE FUNCTION public.suma(num1 integer, num2 integer) RETURNS integer
    LANGUAGE sql
    AS $$


	select num1+num2;


$$;
 7   DROP FUNCTION public.suma(num1 integer, num2 integer);
       public          postgres    false            �            1259    139691    clientes    TABLE     �   CREATE TABLE public.clientes (
    id_cliente integer NOT NULL,
    nombre character varying(50),
    telefono character varying(11)
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            �            1259    139694    clientes_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.clientes_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.clientes_id_cliente_seq;
       public          postgres    false    202            �           0    0    clientes_id_cliente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.clientes_id_cliente_seq OWNED BY public.clientes.id_cliente;
          public          postgres    false    203            �            1259    139696 
   graduacion    TABLE     �  CREATE TABLE public.graduacion (
    id_graduacion integer NOT NULL,
    id_cliente smallint NOT NULL,
    esfericoizqlejos character varying(10),
    esfericoizqcerca character varying(10),
    esfericoderlejos character varying(10),
    esfericodercerca character varying(10),
    cilindroizqlejos character varying(10),
    cilindroizqcerca character varying(10),
    cilindroderlejos character varying(10),
    cilindrodercerca character varying(10),
    ejeizqlejos character varying(10),
    ejeizqcerca character varying(10),
    ejederlejos character varying(10),
    ejedercerca character varying(10),
    distanciapupila character varying(10),
    altura character varying(10)
);
    DROP TABLE public.graduacion;
       public         heap    postgres    false            �            1259    139699    graduacion_id_graduacion_seq    SEQUENCE     �   CREATE SEQUENCE public.graduacion_id_graduacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.graduacion_id_graduacion_seq;
       public          postgres    false    204            �           0    0    graduacion_id_graduacion_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.graduacion_id_graduacion_seq OWNED BY public.graduacion.id_graduacion;
          public          postgres    false    205            �            1259    49563    lentes    TABLE     �   CREATE TABLE public.lentes (
    numeroproducto integer NOT NULL,
    marca character varying(30),
    modelo character varying(10),
    color character varying(15),
    material character varying(15),
    precio double precision
);
    DROP TABLE public.lentes;
       public         heap    postgres    false            �            1259    139701    lentes_id_lentes_seq    SEQUENCE     �   CREATE SEQUENCE public.lentes_id_lentes_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.lentes_id_lentes_seq;
       public          postgres    false            �            1259    49575    lentes_vendidos    TABLE     �   CREATE TABLE public.lentes_vendidos (
    numeroproducto integer NOT NULL,
    marca character varying(30),
    modelo character varying(10),
    color character varying(15),
    material character varying(15),
    precio double precision
);
 #   DROP TABLE public.lentes_vendidos;
       public         heap    postgres    false            �            1259    139703 	   productos    TABLE     |   CREATE TABLE public.productos (
    id_producto integer NOT NULL,
    nombre character varying(50),
    cantidad integer
);
    DROP TABLE public.productos;
       public         heap    postgres    false            �            1259    139706    productos_id_producto_seq    SEQUENCE     �   CREATE SEQUENCE public.productos_id_producto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.productos_id_producto_seq;
       public          postgres    false    207            �           0    0    productos_id_producto_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.productos_id_producto_seq OWNED BY public.productos.id_producto;
          public          postgres    false    208            �            1259    139708    ventas    TABLE     �   CREATE TABLE public.ventas (
    id_venta integer NOT NULL,
    id_cliente smallint NOT NULL,
    id_lentes smallint NOT NULL,
    fecha date,
    total integer
);
    DROP TABLE public.ventas;
       public         heap    postgres    false            �            1259    139711    ventas_id_venta_seq    SEQUENCE     �   CREATE SEQUENCE public.ventas_id_venta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.ventas_id_venta_seq;
       public          postgres    false    209            �           0    0    ventas_id_venta_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.ventas_id_venta_seq OWNED BY public.ventas.id_venta;
          public          postgres    false    210            �            1259    139713    view_cliente_graduacion    VIEW     r  CREATE VIEW public.view_cliente_graduacion AS
 SELECT clientes.nombre,
    clientes.telefono,
    graduacion.esfericoizqlejos,
    graduacion.esfericoizqcerca,
    graduacion.esfericoderlejos,
    graduacion.esfericodercerca,
    graduacion.cilindroizqlejos,
    graduacion.cilindroizqcerca,
    graduacion.cilindroderlejos,
    graduacion.cilindrodercerca,
    graduacion.ejeizqlejos,
    graduacion.ejeizqcerca,
    graduacion.ejederlejos,
    graduacion.ejedercerca,
    graduacion.distanciapupila,
    graduacion.altura
   FROM public.clientes,
    public.graduacion
  WHERE (clientes.id_cliente = graduacion.id_cliente);
 *   DROP VIEW public.view_cliente_graduacion;
       public          postgres    false    204    204    204    202    204    204    204    204    204    204    202    202    204    204    204    204    204    204            F           2604    139717    clientes id_cliente    DEFAULT     z   ALTER TABLE ONLY public.clientes ALTER COLUMN id_cliente SET DEFAULT nextval('public.clientes_id_cliente_seq'::regclass);
 B   ALTER TABLE public.clientes ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    203    202            G           2604    139718    graduacion id_graduacion    DEFAULT     �   ALTER TABLE ONLY public.graduacion ALTER COLUMN id_graduacion SET DEFAULT nextval('public.graduacion_id_graduacion_seq'::regclass);
 G   ALTER TABLE public.graduacion ALTER COLUMN id_graduacion DROP DEFAULT;
       public          postgres    false    205    204            H           2604    139719    productos id_producto    DEFAULT     ~   ALTER TABLE ONLY public.productos ALTER COLUMN id_producto SET DEFAULT nextval('public.productos_id_producto_seq'::regclass);
 D   ALTER TABLE public.productos ALTER COLUMN id_producto DROP DEFAULT;
       public          postgres    false    208    207            I           2604    139720    ventas id_venta    DEFAULT     r   ALTER TABLE ONLY public.ventas ALTER COLUMN id_venta SET DEFAULT nextval('public.ventas_id_venta_seq'::regclass);
 >   ALTER TABLE public.ventas ALTER COLUMN id_venta DROP DEFAULT;
       public          postgres    false    210    209            �          0    139691    clientes 
   TABLE DATA           @   COPY public.clientes (id_cliente, nombre, telefono) FROM stdin;
    public          postgres    false    202   FA       �          0    139696 
   graduacion 
   TABLE DATA             COPY public.graduacion (id_graduacion, id_cliente, esfericoizqlejos, esfericoizqcerca, esfericoderlejos, esfericodercerca, cilindroizqlejos, cilindroizqcerca, cilindroderlejos, cilindrodercerca, ejeizqlejos, ejeizqcerca, ejederlejos, ejedercerca, distanciapupila, altura) FROM stdin;
    public          postgres    false    204   �A       �          0    49563    lentes 
   TABLE DATA           X   COPY public.lentes (numeroproducto, marca, modelo, color, material, precio) FROM stdin;
    public          postgres    false    200   ]B       �          0    49575    lentes_vendidos 
   TABLE DATA           a   COPY public.lentes_vendidos (numeroproducto, marca, modelo, color, material, precio) FROM stdin;
    public          postgres    false    201   C       �          0    139703 	   productos 
   TABLE DATA           B   COPY public.productos (id_producto, nombre, cantidad) FROM stdin;
    public          postgres    false    207   �C       �          0    139708    ventas 
   TABLE DATA           O   COPY public.ventas (id_venta, id_cliente, id_lentes, fecha, total) FROM stdin;
    public          postgres    false    209   �C       �           0    0    clientes_id_cliente_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.clientes_id_cliente_seq', 45, true);
          public          postgres    false    203            �           0    0    graduacion_id_graduacion_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.graduacion_id_graduacion_seq', 17, true);
          public          postgres    false    205            �           0    0    lentes_id_lentes_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.lentes_id_lentes_seq', 10, true);
          public          postgres    false    206            �           0    0    productos_id_producto_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.productos_id_producto_seq', 1, false);
          public          postgres    false    208            �           0    0    ventas_id_venta_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.ventas_id_venta_seq', 6, true);
          public          postgres    false    210            O           2606    139722    clientes clientes_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id_cliente);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public            postgres    false    202            Q           2606    139724    graduacion graduacion_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.graduacion
    ADD CONSTRAINT graduacion_pkey PRIMARY KEY (id_graduacion);
 D   ALTER TABLE ONLY public.graduacion DROP CONSTRAINT graduacion_pkey;
       public            postgres    false    204            K           2606    49567     lentes lentes_numeroproducto_key 
   CONSTRAINT     e   ALTER TABLE ONLY public.lentes
    ADD CONSTRAINT lentes_numeroproducto_key UNIQUE (numeroproducto);
 J   ALTER TABLE ONLY public.lentes DROP CONSTRAINT lentes_numeroproducto_key;
       public            postgres    false    200            M           2606    49579 2   lentes_vendidos lentes_vendidos_numeroproducto_key 
   CONSTRAINT     w   ALTER TABLE ONLY public.lentes_vendidos
    ADD CONSTRAINT lentes_vendidos_numeroproducto_key UNIQUE (numeroproducto);
 \   ALTER TABLE ONLY public.lentes_vendidos DROP CONSTRAINT lentes_vendidos_numeroproducto_key;
       public            postgres    false    201            S           2606    139726    productos productos_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id_producto);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    207            U           2606    139728    ventas ventas_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id_venta);
 <   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_pkey;
       public            postgres    false    209            Y           2620    139743    ventas eliminarlentes_venta    TRIGGER     y   CREATE TRIGGER eliminarlentes_venta AFTER DELETE ON public.ventas FOR EACH ROW EXECUTE FUNCTION public.eliminarlentes();
 4   DROP TRIGGER eliminarlentes_venta ON public.ventas;
       public          postgres    false    215    209            Z           2620    139740    ventas estucheregalo_ventas    TRIGGER     w   CREATE TRIGGER estucheregalo_ventas AFTER INSERT ON public.ventas FOR EACH ROW EXECUTE FUNCTION public.bajarestuche();
 4   DROP TRIGGER estucheregalo_ventas ON public.ventas;
       public          postgres    false    209    214            X           2620    49581    lentes insertar_en_ventas    TRIGGER     y   CREATE TRIGGER insertar_en_ventas AFTER DELETE ON public.lentes FOR EACH ROW EXECUTE FUNCTION public.mover_a_vendidos();
 2   DROP TRIGGER insertar_en_ventas ON public.lentes;
       public          postgres    false    200    213            W           2606    139729    ventas fk_clientes 
   FK CONSTRAINT        ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT fk_clientes FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente);
 <   ALTER TABLE ONLY public.ventas DROP CONSTRAINT fk_clientes;
       public          postgres    false    202    2895    209            V           2606    139734    graduacion fk_clientes 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.graduacion
    ADD CONSTRAINT fk_clientes FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente);
 @   ALTER TABLE ONLY public.graduacion DROP CONSTRAINT fk_clientes;
       public          postgres    false    204    2895    202            �   {   x�=�=�0Fg�=A�q~V��*.�������_����}���m�]�t���P$q��	���I������)m��>&��cN.2
�c����w��e%F���f�b�~�:���x
1e|Έ�}�#      �   |   x���1�0빯X �v��!�����Qj���T������*��jq��a\�suxe�J�Ƈ�;o.�<Ȣ-�J��WA�k5���x�'���3�p��~F��7�b����"���3      �   �   x�]��
�0���^E�mj���#����Y�-6��۰�u��|��ᢼ��yC�Y����G�Z()-� %^���9��ur%xMI���=�4������;�QCE)�;���Y'��Z�h���L�,;?Q$Dg�w��]��C��͆�)�n`��h�[�V:T��Eo!�E�`i      �   a   x�3��,����t׵4�L�*���M-I��460�2�������E��09SS.d�����|$Is�d T� '��$39��h�����,d�1z\\\ �$,�      �   
   x������ � �      �   I   x�U̹
�0Cњ�Ł��.��(�����!����R�4:R�]c4qj�&2q�e����ў��U|/����     