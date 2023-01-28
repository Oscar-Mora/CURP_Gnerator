<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();
        $user = User::create($request->all());
        $user->save();
        return
            redirect()->route('users.show', $user);
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function edit()
    {
    }

    public function destroy($user)
    {
        dd($user);
        $user->delete();
    }

    public function create_curp(User $user)
    {

        $CURP = $this->first($user) . $this->second($user) .
            $this->third($user) . $this->fourth($user) .
            $this->fifth($user) . $this->sixth($user) .
            $this->seventh($user) . $this->eighth($user);

            $user_= User::find($user->id);
            $user_->curp = $CURP;
            $user_->save();

        return redirect()->to(view('users.curp', compact(['CURP', 'user'])));
    }

    public function first($user)
    {
        //primeras 2 letras del primer apellido
        return str_split($user->last_name_1, 2)[0];
    }
    public function second($user)
    {
        //primera letra del segundo apellido
        return str_split($user->last_name_2, 1)[0];
    }
    public function third($user)
    {
        //primera letra del nombre
        return str_split($user->names, 1)[0];
    }
    public function fourth($user)
    {
        //fecha por año mes día
        $date  = explode('-', $user->birth_date); //date-> [1990,02,02 yyyy-mm-dd
        $month = $date[1]; //mes 01
        $year  = str_split($date[0], 2); //[20,22]
        $year_parse = $year[1]; //23
        $day  = $date[2]; //20
        return ($year_parse . $month . $day);
    }
    public function fifth($user)
    {
        //genero
        return $user->gender;
    }
    public function sixth($user)
    {
        //lugar de nacimiento
        return $user->place_of_birth;
    }
    function bring_consonant($elemento, $consonants)
    {
        for ($i = 0; $i <= count($elemento); $i++) {
            if (in_array($elemento[$i], $consonants)) {
                return $almacenar[$i] = $elemento[$i];
            }
        };
    }
    // function es_consonante($consonante){
    //     $vowels=['a','e','i','o','u'];    
    //     return !in_array($consonante,$vowels);
    // }

    public function seventh($user)
    {
        //primer consonante interna
        $first_ln = str_split(substr($user->last_name_1, 1));
        $second_ln = str_split(substr($user->last_name_2, 1));
        $names = str_split(substr($user->names, 1));

        $consonants = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'ñ', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z', 'B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Y', 'Z'];


        $first_ln = $this->bring_consonant($first_ln, $consonants)[0];
        $second_ln = $this->bring_consonant($second_ln, $consonants)[0];
        $names = $this->bring_consonant($names, $consonants)[0];

        return ($first_ln . $second_ln . $names);
    }
    public function eighth($user)
    {
        /**
         * / Carácter diferenciador de homonimia y siglo asignado por la aplicación: 0-9 para fechas de nacimiento hasta el 31 de diciembre de 1999, y A-J para fechas de nacimiento a partir del día 01 de enero del año 2000 (numérica o alfabética).
         *  */

        /**
         ** Cuando las primeras 16 posiciones de la CURP son exactamente iguales en dos o más registros existentes, se genera progresivamente un número o letra (dependiendo del siglo) e indicador de una homonimia, en su caso. Entendiéndose como registro homónimo cuando el valor en esta posición es mayor a 0 o diferente de A 
         * 
         * 
         * 
         */

        $var = 0;
        if ($user->birth_date <= ('1999-12-31')) {
            
            return $this->$var = rand(0, 9);
        } else {
            $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
            $r_lettr = rand(0, 9);
            return
                $this->$var = $letters[$r_lettr];
        }

        return $var;
    }
    //Corresponde al dígito verificador, el cual es un carácter asignado por la Secretaría de Gobernación, a través de la aplicación de un algoritmo que permite calcular y verificar la correcta conformación de la clave.//elimina homonimidad.
    public function nineth(User $user)
    {
        $var = [];
        foreach ($user as $u => $CURP) {
            $var = array_push($var,[$u => $CURP]);
            return $var;
        }
        return $var;
        // $this->$var = rand(0, 9);
    }
}
