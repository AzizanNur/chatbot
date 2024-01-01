<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use OpenAI;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    function index(){

        if(session()->get('chat')){
            $context = session()->get('chat');
        }else{
            $context[] = ['role' => 'Assistant', 'content' => 'Halo Ajukan Pertanyaan Anda?'];
        }
        return view('chat', compact('context'));
    }

    public function hapusSession(){
        Session::forget('chat');
        return redirect('chat');
    }

    public function prosesChat(Request $request){

        $context = session()->get('chat');
        $content = $request->content;
        $context[] = ['role' => 'user', 'content' => $content];
        $yourApiKey = getenv('YOUR_API_KEY');
        $client = OpenAI::client($yourApiKey);

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => array_values($context),
        ]);

        foreach ($response->choices as $result) {
            $context[] = [
                            'role'=>'assistant',
                            'content'=>$result->message->content
                        ];
        }

        session(['chat' => $context]);
        return redirect('chat');
    }
}
