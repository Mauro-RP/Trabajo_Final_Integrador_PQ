<?php 
class EmpleadoTest extends \PHPUnit\Framework\TestCase 
{
	public function crearE_Eventual($nombre = "Nicolas", $apellido = "Quartero", $dni = 36000111, $salario= 60000, $montos= [100,200,300,400])
	{
		$e = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$montos);
		return $e;
	}

	public function crearE_Permanente($nombre = "Mauro", $apellido = "Prieto", $dni = 37000111, $salario= 70000, $fechaIngreso = null)
	{
		$e = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$salario,$fechaIngreso);
		return $e;
	}

	public function testNombreApellidoDelEmpleado()
	{
		$e = $this->crearE_Eventual();
		$this->assertEquals("Nicolas Quartero",$e->getNombreApellido());
		$p = $this->crearE_Permanente();
		$this->assertEquals("Mauro Prieto",$p->getNombreApellido());
	}

	public function testNoSePuedeCrearConNombreVacioEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("");
	}

	public function testNoSePuedeCrearConNombreVacioEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$p = $this->crearE_Permanente("");
	}

	public function testNoSePuedeCrearConApellidoVacioEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("Nicolas","");
	}

	public function testNoSePuedeCrearConApellidoVacioEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$p = $this->crearE_Permanente("Mauro","");
	}

	public function testDNIDelEmpleado()
	{
		$e = $this->crearE_Eventual();
		$this->assertEquals(36000111,$e->getDNI());
		$p = $this->crearE_Permanente();
		$this->assertEquals(37000111,$p->getDNI());
	}

	public function testNoSePuedeConstruirConDNIconteniendoLetrasEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("Nicolas","Quartero",'361a12b2');	
	}

	public function testNoSePuedeConstruirConDNIconteniendoLetrasEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$p = $this->crearE_Permanente("Mauro","Prieto",'361a12b2');		
	}

	public function testNoSePuedeConstruirConDNIvacioEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("Nicolas","Quartero","");
	}

	public function testNoSePuedeConstruirConDNIvacioEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Permanente("Mauro","Prieto","");
	}

	public function testSalarioDelEmpleado()
	{
		$e = $this->crearE_Eventual();
		$this->assertEquals(60000,$e->getSalario());
		$p = $this->crearE_Permanente();
		$this->assertEquals(70000,$p->getSalario());
	}

	public function testNoSePuedeConstruirConSalarioVacioEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("Nicolas","Quartero",36000111,"");		
	}

	public function testNoSePuedeConstruirConSalarioVacioEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$p = $this->crearE_Permanente("Mauro","Prieto",37000111,"");		
	}

	public function testGetYSetSectorDelEmpleado()
	{
		$e = $this->crearE_Eventual(); //'e' de Eventual
		$e -> setSector('e');
		$this->assertEquals('e',$e->getSector());
		$p = $this->crearE_Permanente(); //'p' de Permanente
		$p -> setSector('p');
		$this->assertEquals('p',$p->getSector());
	}

	public function test__toString()
	{
		$e = $this->crearE_Eventual();
		$this->assertEquals("Nicolas Quartero 36000111 60000",$e->__toString());
		$p = $this->crearE_Permanente();
		$this->assertEquals("Mauro Prieto 37000111 70000",$p->__toString());
	}

	public function testSiNoSeEspecificaElSector()
	{
		$e = $this->crearE_Eventual();
		$this->assertEquals("No especificado",$e->getSector());
		$p = $this->crearE_Permanente();
		$this->assertEquals("No especificado",$p->getSector());
	}

}

?>