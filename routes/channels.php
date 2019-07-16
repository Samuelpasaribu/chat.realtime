<?php
// use App\Models\GrupUser;


/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('grup.{grupuser}', function ($user, $grupuser) {
// Broadcast::channel('grup', function () {
// // Broadcast::channel('grup-chat.{id}', function ($user, $id) {
//     // return (int) $user->id === \App\Models\GrupUser::find($grupuser)->user_id;
//     // return $grupuser->hasUser($user->id);
//     return true;
// });
Broadcast::channel('grup.{grup_id}', function ($user, $grup_id) {
// Broadcast::channel('grup-chat.{id}', function ($user, $id) {
    // return (int) $user->id === \App\Models\GrupUser::find($grup_id)->user_id;
    // return (int) $user->id === \App\Models\GrupUser::where(['grup_id' => 8])->select('user_id');
    
    // return (int) $user->id === 111;
    // return \App\Models\GrupUser::where(['grup_id' => $grup_id, $us]);
    // return true;

    $cek =  \App\Models\GrupUser::where(['grub_id' => $grup_id, 'user_id' => $user->id])->exists();

    if($cek){
        return true;
    }else{
        return false;
    }
});

// Broadcast::channel('private.{id_tujuan}', function ($user, $id_tujuan) {
Broadcast::channel('privatechat', function () {
    // $cek =  \App\Models\GrupUser::where(['grub_id' => $grup_id, 'id_tujuan' => $user->id])->exists();
    // if($cek){
    //     return true;
    // }else{
    //     return false;
    // }

    // return (int) $user->id === (int) $id_tujuan;

    return true;

});
