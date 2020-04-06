<?php 

class m_plados extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function obt_productos()
    {
    	$qry = '';

    	$qry = "
    	SELECT
    	p.id_catProducto
       ,t.producto
	   ,l.linea
       ,c.color
       ,p.color as idColor
       ,p.modelo
       ,p.precio
       ,p.foto
       ,p.descripcion
		FROM tb_cat_producto p
		LEFT JOIN tb_cat_tipo t ON t.id_tipo = p.producto
		LEFT JOIN tb_cat_linea l ON l.id_linea = p.linea
		LEFT JOIN tb_cat_colores c ON c.codigo = p.color";

		return $this->db->query($qry)->result();
    }

    function obt_articulo($id)
    {
    	$qry = '';

    	$qry = "
    	SELECT 
    	p.id_catProducto
       ,t.producto
	   ,l.linea
	   ,p.color as idColor 
       ,c.color
       ,p.modelo
       ,p.precio
       ,p.foto
       ,p.descripcion
		FROM tb_cat_producto p
		LEFT JOIN tb_cat_tipo t ON t.id_tipo = p.producto
		LEFT JOIN tb_cat_linea l ON l.id_linea = p.linea
		LEFT JOIN tb_cat_colores c ON c.codigo = p.color
		WHERE id_catProducto = $id";

		return $this->db->query($qry)->row();   	

    }

    function obt_relacionados($modelo)
    {
    	$qry = '';

    	$qry = "
    	SELECT t.producto
	   ,l.linea
       ,c.color
       ,p.modelo
       ,p.precio
       ,p.foto
       ,p.descripcion
		FROM tb_cat_producto p
		LEFT JOIN tb_cat_tipo t ON t.id_tipo = p.producto
		LEFT JOIN tb_cat_linea l ON l.id_linea = p.linea
		LEFT JOIN tb_cat_colores c ON c.codigo = p.color
		WHERE id_catProducto = $id";

		return $this->db->query($qry)->row();   	
    }

    function busqueda($criterio)
	{
		$qry = "";
		
		$qry = "SELECT 
				id_articulo,
				t.titulo,
				c.capitulo,
				s.seccion,
				a.articulo
				FROM 
				mj_cat_articulo a
				LEFT JOIN mj_cat_titulos t ON t.id = a.titulo
				LEFT JOIN mj_cat_seccion s ON s.id_seccion = a.seccion
				LEFT JOIN mj_cat_capitulos c ON c.id_capitulo = a.capitulo
				WHERE MATCH (a.articulo) AGAINST ('$criterio' IN BOOLEAN MODE )";

		return $this->db->query($qry)->result();	
	}

	function color($color)
	{
		if($color == 58){
            $esta = ' <span style="background-color: #f3f3f3 !important; border-color:#000 !important" class="badge badge-info badge-circle"><i class="fa fa-tint"></i> </span>';
            return $esta;
        }
        if($color == 44){
            $esta = ' <span style="background-color: #292a2a !important; border-color:#000" class="badge badge-info badge-circle"><i class="fa fa-tint"></i> </span>';
            return $esta;
        }
          if($color == 42){
            $esta = ' <span style="background-color: #B6AFA9 !important; border-color:#000" class="badge badge-info badge-circle"><i class="fa fa-tint"></i> </span>';
            return $esta;
        }
	}

	function resaltar($texto, $criterio)
	{
	$claves = explode(" ",$criterio); 
    $clave = array_unique($claves);
    $num = count($clave); 
    for($i=0; $i < $num; $i++){
        $texto = preg_replace("/(".trim($clave[$i]).")/i","<span style='color: #000000;
	background: #55FF2A;
	font-weight: bold;'>\\1</span>",$texto);
    }
    return $texto;
	}
}