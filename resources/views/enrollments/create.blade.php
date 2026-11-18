@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')

<style>
    .enroll-page {
        min-height: 100vh;
        padding: 55px 20px 75px;
        background:
            radial-gradient(circle at 10% 10%, rgba(167, 243, 208, .40), transparent 32%),
            radial-gradient(circle at 90% 85%, rgba(191, 219, 254, .45), transparent 35%),
            linear-gradient(135deg, #f4faf7, #f5f7ff 55%, #effaf8);
    }

    .enroll-wrapper {
        max-width: 1000px;
        margin: auto;
    }

    .enroll-header {
        margin-bottom: 32px;
    }

    .enroll-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        border-radius: 50px;
        background: #e1f5eb;
        color: #16764f;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 18px;
    }

    .enroll-title {
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 800;
        color: #163b30;
        letter-spacing: -1.5px;
        margin-bottom: 12px;
    }

    .enroll-subtitle {
        color: #718078;
        font-size: 15px;
        line-height: 1.8;
        max-width: 650px;
    }

    .enroll-card {
        background: rgba(255, 255, 255, .92);
        border: 1px solid rgba(226, 236, 230, .9);
        border-radius: 26px;
        overflow: hidden;
        box-shadow: 0 18px 55px rgba(31, 65, 48, .08);
    }

    .enroll-card-top {
        padding: 28px 35px;
        background: linear-gradient(120deg, #f0faf5, #f5f8ff);
        border-bottom: 1px solid #edf2ef;
    }

    .enroll-card-top h3 {
        color: #234438;
        font-size: 19px;
        font-weight: 750;
        margin: 0 0 8px;
    }

    .enroll-card-top p {
        color: #7b8981;
        font-size: 13px;
        margin: 0;
    }

    .enroll-card-body {
        padding: 35px;
    }

    .enroll-label {
        display: block;
        font-weight: 700;
        color: #334b3e;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .enroll-input,
    .enroll-select {
        width: 100%;
        border: 1px solid #dfe9e3 !important;
        border-radius: 13px !important;
        padding: 14px 16px !important;
        background-color: #fbfdfc !important;
        color: #253d31 !important;
        font-size: 14px !important;
        transition: .25s ease;
        box-shadow: none !important;
    }

    .enroll-input:focus,
    .enroll-select:focus {
        border-color: #48a77c !important;
        background: white !important;
        box-shadow: 0 0 0 4px rgba(72, 167, 124, .12) !important;
        outline: none;
    }

    .enroll-field {
        margin-bottom: 24px;
    }

    .enroll-hint {
        color: #8a9890;
        font-size: 12px;
        margin-top: 8px;
    }

    #availability {
        border-radius: 14px !important;
        padding: 16px 18px !important;
        font-size: 13px;
        border: 1px solid #dcebe3;
        margin: 25px 0;
    }

    .enroll-submit {
        border: none;
        border-radius: 13px;
        padding: 15px 26px;
        background: linear-gradient(135deg, #21865b, #146744);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: .3px;
        box-shadow: 0 8px 20px rgba(30, 120, 78, .20);
        transition: all .25s ease;
    }

    .enroll-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(30, 120, 78, .28);
        background: linear-gradient(135deg, #269767, #12613d);
        color: white;
    }

    .enroll-footer-note {
        text-align: center;
        color: #89968e;
        font-size: 12px;
        margin-top: 23px;
    }

    .enroll-footer-note span {
        color: #238354;
        font-weight: 700;
    }

    @media (max-width: 576px) {
        .enroll-page {
            padding: 35px 13px;
        }

        .enroll-card-top,
        .enroll-card-body {
            padding: 24px 20px;
        }

        .enroll-title {
            letter-spacing: -1px;
        }

        .enroll-submit {
            width: 100%;
        }
    }
</style>

<div class="enroll-page">
    <div class="enroll-wrapper">

        <div class="enroll-header">
            <div class="enroll-badge">
                ✦ KURSUSKU REGISTRATION
            </div>

            <h1 class="enroll-title">Pendaftaran Kursus</h1>

            <p class="enroll-subtitle">
                Mulai perjalanan belajar dan tingkatkan keterampilanmu.
                Isi data dengan benar dan pilih program kursus yang ingin kamu ikuti.
        </div>

        <div class="enroll-card">

            <div class="enroll-card-top">
                <h3>Formulir Pendaftaran</h3>
                <p>Lengkapi informasi peserta untuk melanjutkan pendaftaran.</p>
            </div>

            <div class="enroll-card-body">

                <form method="POST" action="{{ route('enrollments.preview') }}">
                    @csrf

                    <div class="enroll-field">
                        <label for="name" class="enroll-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control enroll-input"
                               placeholder="Masukkan nama lengkap"
                               required>
                    </div>

                    <div class="enroll-field">
                        <label for="email" class="enroll-label">
                            Email
                        </label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control enroll-input"
                               placeholder="contoh@email.com"
                               required>
                    </div>

                    <div class="enroll-field">
                        <label for="course_id" class="enroll-label">
                            Program Kursus
                        </label>

                        <select id="course_id"
                                name="course_id"
                                class="form-select enroll-select"
                                required>
                            <option value="">-- Pilih program kursus --</option>

                            @foreach ($courses as $id => $course)
                                <option value="{{ $id }}"
                                    @selected(old('course_id') == $id)>
                                    {{ $course['name'] }}
                                </option>
                            @endforeach
                        </select>

                        <div class="enroll-hint">
                            Pilih program yang sesuai dengan minat belajarmu.
                        </div>
                    </div>

                    <div id="availability" class="alert alert-secondary">
                        Pilih kursus untuk melihat informasi ketersediaan kursi.
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button class="enroll-submit" type="submit">
                        Kirim Pendaftaran &nbsp; →
                    </button>

                </form>

            </div>
        </div>

        <div class="enroll-footer-note">
            ✦ Pendaftaran mudah, belajar lebih terarah bersama
            <span>KursusKu</span>
        </div>

    </div>
</div>

@endsection