@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')

<style>
    .en12-page {
        padding: 50px 20px 75px;
        min-height: 85vh;
        background:
            radial-gradient(ellipse at top left, #d9f5e7 0%, transparent 45%),
            radial-gradient(ellipse at bottom right, #e2eaff 0%, transparent 40%),
            linear-gradient(135deg, #f5faf7, #f5f7fc);
    }

    .en12-wrap {
        max-width: 1050px;
        margin: 0 auto;
    }

    .en12-heading {
        margin-bottom: 30px;
    }

    .en12-badge {
        display: inline-block;
        padding: 8px 15px;
        background: #e2f5eb;
        color: #18764d;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        margin-bottom: 18px;
    }

    .en12-title {
        color: #183c2e;
        font-size: 42px;
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 12px;
    }

    .en12-description {
        color: #78877e;
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    .en12-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #e8efe9;
        box-shadow: 0 20px 60px rgba(27, 61, 43, .08);
    }

    .en12-card-header {
        padding: 27px 35px;
        background: linear-gradient(120deg, #f0faf4, #f3f6ff);
        border-bottom: 1px solid #edf1ee;
    }

    .en12-card-header h3 {
        color: #254536;
        font-size: 19px;
        font-weight: 800;
        margin: 0 0 7px;
    }

    .en12-card-header p {
        color: #829087;
        font-size: 13px;
        margin: 0;
    }

    .en12-card-body {
        padding: 35px;
    }

    .en12-field {
        margin-bottom: 26px;
    }

    .en12-label {
        display: block;
        color: #354b3d;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .en12-select {
        display: block;
        width: 100%;
        padding: 15px 16px;
        background-color: #fbfdfc;
        border: 1px solid #dfe9e2;
        border-radius: 13px;
        color: #304638;
        font-size: 14px;
        transition: .25s ease;
    }

    .en12-select:focus {
        outline: none;
        border-color: #46a879;
        box-shadow: 0 0 0 4px rgba(70, 168, 121, .12);
        background: #ffffff;
    }

    .en12-error {
        margin-top: 9px;
        color: #dc3545;
        font-size: 13px;
    }

    .en12-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 0;
        border-radius: 13px;
        padding: 15px 26px;
        background: linear-gradient(135deg, #21865b, #145e40);
        color: #ffffff;
        font-weight: 750;
        font-size: 14px;
        box-shadow: 0 8px 20px rgba(30, 120, 78, .20);
        transition: .25s ease;
    }

    .en12-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(30, 120, 78, .25);
        background: linear-gradient(135deg, #269667, #12613d);
        color: #ffffff;
    }

    .en12-footer {
        text-align: center;
        margin-top: 22px;
        color: #89968e;
        font-size: 12px;
    }

    .en12-footer strong {
        color: #248355;
    }

    @media (max-width: 600px) {
        .en12-page {
            padding: 30px 13px 50px;
        }

        .en12-title {
            font-size: 32px;
        }

        .en12-card-header,
        .en12-card-body {
            padding: 24px 20px;
        }

        .en12-submit {
            width: 100%;
        }
    }
</style>

<div class="en12-page">
    <div class="en12-wrap">

        <div class="en12-heading">
            <div class="en12-badge">✦ KURSUSKU MANAGEMENT</div>

            <h1 class="en12-title">Tambah Enrollment</h1>

            <p class="en12-description">
                Hubungkan peserta dengan program kursus yang dipilih.
                Kelola pendaftaran dengan mudah melalui sistem KursusKu.
            </p>
        </div>

        <div class="en12-card">

            <div class="en12-card-header">
                <h3>Formulir Enrollment</h3>
                <p>Lengkapi data peserta dan pilih program kursus.</p>
            </div>

            <div class="en12-card-body">

                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <div class="en12-field">
                        <label for="participant_id" class="en12-label">
                            Peserta
                        </label>

                        <select name="participant_id"
                                id="participant_id"
                                class="en12-select"
                                required>
                            <option value="">-- Pilih Peserta --</option>

                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}"
                                    @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} — {{ $participant->email }}
                                </option>
                            @endforeach
                        </select>

                        @error('participant_id')
                            <div class="en12-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="en12-field">
                        <label for="course_id" class="en12-label">
                            Program Kursus
                        </label>

                        <select name="course_id"
                                id="course_id"
                                class="en12-select"
                                required>
                            <option value="">-- Pilih Course --</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    @selected(old('course_id') == $course->id)>
                                    {{ $course->code }} — {{ $course->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('course_id')
                            <div class="en12-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="en12-submit">
                        Simpan Enrollment <span>→</span>
                    </button>

                </form>

            </div>
        </div>

        <div class="en12-footer">
            ✦ Kelola pendaftaran lebih mudah bersama <strong>KursusKu</strong>
        </div>

    </div>
</div>

@endsection