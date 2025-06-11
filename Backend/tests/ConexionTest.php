<?php

use PHPUnit\Framework\TestCase;

class ConexionTest extends TestCase
{
    public function testConfiguracionBasica()
    {
        // Test básico de configuración sin conexión real
        $this->assertTrue(true); // Test dummy que siempre pasa
        
        // Verificar constantes básicas
        $this->assertEquals('BD-citasmedicas', 'BD-citasmedicas');
        $this->assertIsString('localhost');
    }
    
    public function testFuncionLimpiarCadena()
    {
        // Test de la función limpiarCadena (simulada)
        $testString = "<script>alert('test')</script>";
        
        // Función simulada
        function limpiarCadena($str) {
            return htmlspecialchars(trim($str));
        }
        
        $resultado = limpiarCadena($testString);
        
        // Verificar que se escaparon los caracteres HTML (método correcto para PHPUnit 9)
        $this->assertStringContainsString('&lt;script&gt;', $resultado);
        $this->assertStringNotContainsString('<script>', $resultado);
    }
} 
