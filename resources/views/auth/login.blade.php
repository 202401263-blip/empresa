@extends('layouts.guest')

@section('content')
<div style="position: fixed; inset: 0; width: 100vw; height: 100vh; background-color: #0f172a; z-index: 99999; margin: 0; padding: 0; font-family: system-ui, -apple-system, sans-serif; overflow: hidden;">
    
    <div id="bg-slide-1" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; opacity: 0.55; z-index: 0; transition: opacity 1.5s ease-in-out;"></div>
    <div id="bg-slide-2" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; opacity: 0; z-index: 0; transition: opacity 1.5s ease-in-out;"></div>
    <div id="bg-slide-3" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; opacity: 0; z-index: 0; transition: opacity 1.5s ease-in-out;"></div>
    <div id="bg-slide-4" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1581094288338-2314dddb7ece?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; opacity: 0; z-index: 0; transition: opacity 1.5s ease-in-out;"></div>
    <div id="bg-slide-5" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; opacity: 0; z-index: 0; transition: opacity 1.5s ease-in-out;"></div>
    
    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(15,23,42,0.75) 0%, rgba(30,41,59,0.35) 60%, rgba(15,23,42,0.75) 100%); z-index: 1;"></div>

    <div style="position: relative; z-index: 10; display: grid; grid-template-columns: repeat(12, minmax(0, 1fr)); width: 100%; height: 100%; padding: 3rem; box-sizing: border-box; align-items: center;">
        
        <div style="grid-column: span 7 / span 7; display: flex; flex-direction: column; justify-content: space-between; height: 100%; padding-right: 2rem; box-sizing: border-box;">
            
            <div style="display: flex; align-items: center; gap: 1.25rem;">
                <div style="display: flex; height: 3.75rem; width: 3.75rem; align-items: center; justify-content: center; border-radius: 1rem; background: linear-gradient(135deg, #f59e0b, #d97706); color: #0f172a; box-shadow: 0 6px 25px rgba(245,158,11,0.45);">
                    <svg style="height: 2.25rem; width: 2.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4a2 2 0 0 0 1-1.73z"/>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 900; letter-spacing: 0.2em; text-transform: uppercase; margin: 0; line-height: 1; color: #ffffff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">EMPRESA CONSTRUCTORA</h1>
                    <p style="font-size: 11px; letter-spacing: 0.18em; color: #f59e0b; text-transform: uppercase; margin: 0; margin-top: 0.35rem; font-weight: 800;">INGENIERÍA, DESARROLLO & CONTROL</p>
                </div>
            </div>

            <div style="max-width: 42rem; margin-top: auto; margin-bottom: auto; padding: 1rem 0;">
                <h2 style="font-size: 3.4rem; font-weight: 900; line-height: 1.2; letter-spacing: -0.02em; margin-bottom: 1.5rem; color: #ffffff; text-shadow: 0 4px 20px rgba(0,0,0,0.6);">
                    Innovación y <br>
                    <span style="background: linear-gradient(to right, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">precisión estructural</span> <br>
                    para proyectos de gran escala.
                </h2>
                <p style="font-size: 1.15rem; color: #e2e8f0; font-weight: 400; line-height: 1.65; max-width: 34rem; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">
                    Sistemas integrados para la optimización de recursos, control técnico de obra y sincronización administrativa en tiempo real.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 2rem; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.2); max-width: 35rem;">
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 800; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.4);">Infraestructura</h4>
                    <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0; margin-top: 0.25rem; font-weight: 500;">Estándares internacionales</p>
                </div>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 800; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.4);">Garantía Operativa</h4>
                    <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0; margin-top: 0.25rem; font-weight: 500;">Mitigación de riesgos</p>
                </div>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 800; color: #ffffff; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.4);">Eficiencia</h4>
                    <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0; margin-top: 0.25rem; font-weight: 500;">Recursos optimizados</p>
                </div>
            </div>
        </div>

        <div style="grid-column: span 5 / span 5; display: flex; flex-direction: column; justify-content: space-between; background-color: rgba(30, 41, 59, 0.45); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); padding: 3rem 2.5rem; border-radius: 1.5rem; border: 1px solid rgba(255, 255, 255, 0.12); box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6); height: 90vh; max-height: 580px; box-sizing: border-box;">
            
            <div style="width: 100%; margin: auto 0;">
                
                <div style="display: flex; flex-direction: column; align-items: flex-start; text-align: left; margin-bottom: 2rem;">
                    <div style="margin-bottom: 1rem; display: flex; height: 3.25rem; width: 3.25rem; align-items: center; justify-content: center; border-radius: 1rem; background-color: rgba(255, 255, 255, 0.08); color: #fbbf24; border: 1px solid rgba(255,255,255,0.1);">
                        <svg style="height: 1.6rem; width: 1.6rem;" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <p style="font-size: 0.75rem; font-weight: 800; color: #cbd5e1; letter-spacing: 0.15em; text-transform: uppercase; margin: 0;">SISTEMA CENTRAL DE GESTIÓN</p>
                    <h3 style="font-size: 1.65rem; font-weight: 900; color: #ffffff; margin: 0; margin-top: 0.35rem; letter-spacing: -0.02em;">Ingresar al Panel</h3>
                </div>

                @if ($errors->any())
                    <div style="background-color: rgba(153, 27, 27, 0.85); border: 1px solid #ef4444; border-radius: 0.75rem; padding: 0.85rem; margin-bottom: 1.25rem; backdrop-filter: blur(4px);">
                        @foreach ($errors->all() as $error)
                            <p style="font-size: 0.8rem; color: #fecaca; margin: 0; font-weight: 600;">• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" style="display: flex; flex-direction: column; gap: 1.25rem;">
                    @csrf

                    <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                        <label style="font-size: 0.75rem; font-weight: 700; color: #e2e8f0; text-transform: uppercase; letter-spacing: 0.05em;">Usuario o correo</label>
                        <div class="input-wrapper" style="display: flex; align-items: center; border-radius: 0.75rem; border: 1px solid rgba(255,255,255,0.2); background-color: rgba(15, 23, 42, 0.5); padding: 0 1.15rem; transition: all 0.2s ease-in-out;">
                            <svg class="input-icon" style="height: 1.1rem; width: 1.1rem; color: #cbd5e1; transition: color 0.2s;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0" />
                            </svg>
                            <input type="text" name="login" value="{{ old('login') }}" required autofocus style="width: 100%; background: transparent; border: none; padding: 0.85rem; font-size: 0.9rem; color: #ffffff; outline: none; font-weight: 500;" placeholder="admin" onfocus="handleFocus(this, true)" onblur="handleFocus(this, false)">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.4rem;">
                        <label style="font-size: 0.75rem; font-weight: 700; color: #e2e8f0; text-transform: uppercase; letter-spacing: 0.05em;">Contraseña</label>
                        <div class="input-wrapper" style="display: flex; align-items: center; border-radius: 0.75rem; border: 1px solid rgba(255,255,255,0.2); background-color: rgba(15, 23, 42, 0.5); padding: 0 1.15rem; transition: all 0.2s ease-in-out; position: relative;">
                            <svg class="input-icon" style="height: 1.1rem; width: 1.1rem; color: #cbd5e1; transition: color 0.2s;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7.875a4.125 4.125 0 0 0-8.25 0V10.5m-1.5 0h11.25A1.5 1.5 0 0 1 19.5 12v7.5a1.5 1.5 0 0 1-1.5 1.5H6A1.5 1.5 0 0 1 4.5 19.5V12a1.5 1.5 0 0 1 1.5-1.5Z" />
                            </svg>
                            <input id="password-field" type="password" name="password" required style="width: 100%; background: transparent; border: none; padding: 0.85rem 2rem 0.85rem 0.85rem; font-size: 0.9rem; color: #ffffff; outline: none; font-weight: 500;" placeholder="••••••••" onfocus="handleFocus(this, true)" onblur="handleFocus(this, false)">
                            
                            <button type="button" onclick="togglePasswordVisibility()" style="position: absolute; right: 1rem; background: none; border: none; cursor: pointer; color: #cbd5e1; display: flex; align-items: center; padding: 0;">
                                <svg id="eye-icon" style="height: 1.15rem; width: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; font-size: 0.8rem; margin-top: 0.1rem;">
                        <label style="display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; color: #cbd5e1; cursor: pointer;">
                            <input type="checkbox" name="remember" id="remember" value="1" style="height: 1rem; width: 1rem; border-radius: 0.25rem; background-color: #0f172a; border-color: rgba(255,255,255,0.3); cursor: pointer;">
                            Recordarme en el equipo
                        </label>
                        <a href="#" style="font-weight: 700; color: #fbbf24; text-decoration: none; transition: color 0.15s;" onmouseover="this.style.color='#f59e0b'" onmouseout="this.style.color='#fbbf24'">¿Olvidó la clave?</a>
                    </div>

                    <button type="submit" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 0.5rem; border-radius: 0.75rem; background-color: #fbbf24; color: #0f172a; border: none; padding: 0.9rem 1.5rem; font-size: 0.95rem; font-weight: 800; cursor: pointer; box-shadow: 0 4px 15px rgba(251,191,36,0.35); transition: all 0.2s ease-in-out; margin-top: 0.25rem;" onmouseover="this.style.backgroundColor='#f59e0b'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 22px rgba(245,158,11,0.55)'" onmouseout="this.style.backgroundColor='#fbbf24'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(251,191,36,0.35)'" onmousedown="this.style.transform='translateY(0)'">
                        <span>Autenticar Acceso</span>
                        <svg style="height: 1rem; width: 1rem;" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" /></svg>
                    </button>
                </form>

            </div>
            
            <div style="text-align: center; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                <p style="font-size: 11px; color: #e2e8f0; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin: 0;">
                    &copy; 2026 EMPRESA CONSTRUCTORA. ALL RIGHTS RESERVED.
                </p>
            </div>

        </div>

    </div>
</div>

<script>
    // 1. CARGA AUTOMÁTICA Y SUAVE DE LAS 5 IMÁGENES
    let currentSlide = 1;
    const totalSlides = 5;

    setInterval(() => {
        document.getElementById(`bg-slide-${currentSlide}`).style.opacity = '0';
        currentSlide = currentSlide >= totalSlides ? 1 : currentSlide + 1;
        document.getElementById(`bg-slide-${currentSlide}`).style.opacity = '0.55';
    }, 6000); // 6 Segundos por imagen clara para mejor visualización

    // 2. CONMUTADOR DE PASSWORD VISIBLE
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password-field');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
        }
    }

    // 3. GLOW EFECT INDUSTRIAL EN FOCO DE INPUTS
    function handleFocus(inputElement, isFocused) {
        const wrapper = inputElement.closest('.input-wrapper');
        const icon = wrapper.querySelector('.input-icon');
        
        if (isFocused) {
            wrapper.style.borderColor = '#fbbf24';
            wrapper.style.backgroundColor = 'rgba(15, 23, 42, 0.85)';
            wrapper.style.boxShadow = '0 0 0 4px rgba(251,191,36,0.3)';
            icon.style.color = '#fbbf24';
        } else {
            wrapper.style.borderColor = 'rgba(255,255,255,0.2)';
            wrapper.style.backgroundColor = 'rgba(15, 23, 42, 0.5)';
            wrapper.style.boxShadow = 'none';
            icon.style.color = '#cbd5e1';
        }
    }
</script>
@endsection