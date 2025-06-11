/**
 * Test básico de funciones JavaScript - Frontend
 */

describe('Frontend Functions Tests', () => {

  test('debería formatear datos correctamente', () => {
    // Función simple de formateo
    function formatearTelefono(telefono) {
      // Remover espacios y caracteres especiales
      return telefono.replace(/\D/g, '');
    }
    
    function capitalizarNombre(nombre) {
      return nombre.charAt(0).toUpperCase() + nombre.slice(1).toLowerCase();
    }
    
    // Tests de formateo
    expect(formatearTelefono('123-456-789')).toBe('123456789');
    expect(formatearTelefono('(123) 456 789')).toBe('123456789');
    expect(capitalizarNombre('juan')).toBe('Juan');
    expect(capitalizarNombre('MARÍA')).toBe('María');
  });

}); 
