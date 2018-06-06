@extends('layouts.master')
@section('title', 'Yellow Club - Nueva Dirección')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Nueva Direcciones</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-28.png', 'cart' => 'img/account-31.png', 'active' => 'address'])
                @endcomponent
                <div class="account__right">
                    <h1>+Nueva Dirección</h1>
                    <form id="address" data-abide novalidate>
                        <div class="account__right__form">
                            <div>
                                Descripción* <input class="caja" id="InputDescription" name="description" type="text" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputDescription">Por favor digite la descripción</span>
                            <div>
                                Contacto* <input class="caja" id="InputName" name="name" type="text" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputName">Por favor digite el nombre</span>
                            <div>
                                Dirección* <input class="caja" id="InputAddress" name="address" type="text" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputAddress">Por favor digite la dirección</span>
                            <div>
                                Barrio* <input class="caja" id="InputUrbanization" name="urbanization" type="text" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputUrbanization">Por favor digite el barrio</span>
                            <div>
                                País* <select class="caja" id="country" name="country" required>
                                    <option value="">Seleccione</option>
                                    @foreach($country as $c)
                                        <option value="{{ $c->id }}">{{ $c->PaisNombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="country">Por favor seleccione el país</span>
                            <div>
                                Departamento* <select class="caja opciones_d" id="distric" name="distric" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="distric">Por favor seleccione el departamento</span>
                            <div>
                                Ciudad* <select class="caja opciones_c" id="city" name="city" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="city">Por favor seleccione la ciudad</span>
                            <div>
                                Celular* <input class="caja" id="InputCellphone" name="cellphone" type="text" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputCellphone">Por favor digite algún celular</span>
                            <div>
                                Teléfono <input class="caja" name="phone" type="text"/>
                            </div>
                            {{ csrf_field() }}
                            <input type="hidden" name="action" value="save">
                            <input type="submit" data-id="save" class="button-buy width-100 margin-top-1" value="Guardar" style="color: #333">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @component('componentes.brand', ['brand' => $brand])
    @endcomponent
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
