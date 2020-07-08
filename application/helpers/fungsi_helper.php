<?php

function active_menu($page = "")
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);
    if ($page == $uri) {
        return "active";
    }
}

function menu_open($page = [])
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);
    if (in_array($uri, $page)) {
        return "menu-open";
    }
}

function is_logged_in()
{
    $ci = get_instance();
    if ($ci->session->has_userdata('username')) {
        redirect('admin');
    }
}

function is_level($level, $redirect = false)
{
    $ci = get_instance();
    if ($ci->session->has_userdata('username')) {
        if ($ci->session->userdata('level') == $level) {
            return true;
        } else {
            return $redirect ? redirect('admin') : false;
        }
    } else {
        redirect('auth');
    }
}
function indo_date($date, $print_day = false)
{
    $day        = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $month      = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $split      = explode('-', $date);
    $nice_date  = $split[2] . ' ' . $month[(int) $split[1]] . ' ' . $split[0];

    if ($print_day) {
        $num = date('N', strtotime($date));
        return $day[$num] . ', ' . $nice_date;
    }
    return $nice_date;
}

function is_role($role = 1, $redirect = false)
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    if ($redirect) {
        if ($level != $role) {
            redirect('auth');
        }
    } else {
        return $level == $role ? 1 : 0;
    }
}

function ellipsis($text, $length)
{
    $out = strlen($text) > $length ? substr($text, 0, $length) . "..." : $text;
    return $out;
}

function msgBox($msg = "save", $success = true)
{
    switch ($msg) {
        case "save":
            $pesan = $success ? "Data berhasil disimpan!" : "Gagal menyimpan data!";
            break;
        case "edit":
            $pesan = $success ? "Data berhasil diedit!" : "Gagal mengedit data!";
            break;
        case "delete":
            $pesan = $success ? "Data berhasil dihapus!" : "Gagal menghapus data!";
            break;
        default:
            $pesan = "";
            break;
    }
    $title = $success ? "Berhasil!" : "Gagal!";
    $type = $success ? "success" : "error";
    $alert = "
        <script type='text/javascript'>
        $(document).ready(function() {
            Swal.fire(
                '{$title}',
                '{$pesan}',
                '{$type}'
            );
        });
        </script>
    ";
    $ci = get_instance();
    return $ci->session->set_flashdata('pesan', $alert);
}

function setMsg($type, $msg)
{
    $ci = get_instance();
    $text = "";
    $text .= "<div class='alert alert-{$type}'>";
    $text .= $msg;
    $text .= "</div>";
    return $ci->session->set_flashdata('msg', $text);
}
