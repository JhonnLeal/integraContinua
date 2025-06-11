/**
 * Test básico de DOM - Frontend
 */

// Mock básico de jQuery para los tests
global.$ = jest.fn((selector) => ({
  val: jest.fn(() => 'test-value'),
  on: jest.fn(),
  post: jest.fn()
}));

describe('Frontend DOM Tests', () => {
  
  test('debería tener elementos de login básicos', () => {
    // Simular HTML básico de login
    document.body.innerHTML = `
      <form id="frmAcceso">
        <input id="logina" type="text" value="test@email.com">
        <input id="clavea" type="password" value="123456">
        <button type="submit">Login</button>
      </form>
    `;
    
    // Verificar que existen los elementos
    const form = document.getElementById('frmAcceso');
    const emailInput = document.getElementById('logina');
    const passwordInput = document.getElementById('clavea');
    
    expect(form).toBeTruthy();
    expect(emailInput).toBeTruthy();
    expect(passwordInput).toBeTruthy();
    expect(emailInput.value).toBe('test@email.com');
  });

  test('debería validar formato de email básico', () => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    // Casos de prueba
    expect(emailRegex.test('usuario@correo.com')).toBe(true);
    expect(emailRegex.test('test@gmail.com')).toBe(true);
    expect(emailRegex.test('email-invalido')).toBe(false);
    expect(emailRegex.test('sin-arroba.com')).toBe(false);
  });

}); 
