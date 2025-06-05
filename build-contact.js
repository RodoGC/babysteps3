// Script para compilar la aplicación de contacto con Vite
import { build } from 'vite';
import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

async function buildContactApp() {
  console.log('Iniciando compilación de la aplicación de contacto...');
  
  try {
    await build({
      root: __dirname,
      configFile: resolve(__dirname, 'vite.config.js'),
      build: {
        outDir: 'dist',
        emptyOutDir: true,
        rollupOptions: {
          input: {
            contact: resolve(__dirname, 'src/contact.jsx')
          }
        }
      }
    });
    
    console.log('Aplicación de contacto compilada exitosamente.');
  } catch (error) {
    console.error('Error al compilar la aplicación de contacto:', error);
    process.exit(1);
  }
}

buildContactApp(); 