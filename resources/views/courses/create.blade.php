@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')

<style>
    .create-page {
        min-height: 100vh;
        padding: 30px 0 55px;
        background: linear-gradient(135deg, #f0fdf7, #f4f7ff 55%, #eefaf8);
    }

    .create-banner {
        background: linear-gradient(120deg, #123d35, #087f70, #19a58c);
        border-radius: 22px;
        padding: 30px;
        color: white;
        box-shadow: 0 12px 30px rgba(18, 61, 53, .15);
    }

    .create-banner h1 {
        font-size: 29px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .create-banner p {
        color: #d9f5eb;
        margin-bottom: 0;
    }

    .create-banner img {
        width: 170px;
        max-width: 100%;
        height: 125px;
        object-fit: cover;
        border-radius: 16px;
    }

    .form-panel {
        background: white;
        border: 1px solid #e7eee9;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(20, 70, 55, .06);
    }

    .form-heading {
        color: #174d3e;
        font-weight: 800;
        font-size: 22px;
    }

    .form-description {
        color: #78877f;
        font-size: 14px;
    }

    .form-label {
        color: #315748;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1px solid #dce9e2;
        border-radius: 10px;
        padding: 11px 13px;
        color: #344b40;
        background-color: #fbfdfb;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #16a085;
        box-shadow: 0 0 0 3px rgba(22, 160, 133, .12);
        background-color: white;
    }

    .form-control::placeholder {
        color: #a5b3aa;
    }

    .btn-save {
        background: linear-gradient(120deg, #087f70, #16a085);
        color: white;
        border: none;
        border-radius: 11px;
        padding: 12px 22px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-save:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 7px 17px rgba(8, 127, 112, .23);
    }

    .btn-back {
        background: #edf2ef;
        color: #456257;
        border: none;
        border-radius: 11px;
        padding: 12px 22px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: .2s;
    }

    .btn-back:hover {
        background: #dfeae3;
        color: #174d3e;
    }

    .required-mark {
        color: #dc5555;
    }

    @media (max-width: 768px) {
        .create-banner {
            padding: 23px;
        }

        .create-banner h1 {
            font-size: 24px;
        }

        .create-banner img {
            width: 130px;
            height: 100px;
            margin-top: 18px;
        }

        .form-panel {
            padding: 20px;
        }
    }
</style><div class="create-page">
    <div class="container">    {{-- Banner --}}
    <div class="create-banner mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <span class="badge rounded-pill bg-light text-success mb-3">
                    KURSUSKU · MANAJEMEN KURSUS
                </span>

                <h1>Tambahkan Kursus Baru</h1>

                <p>
                    Lengkapi informasi kursus untuk menambahkan
                    program pembelajaran baru ke KursusKu.
                </p>
            </div>

            <div class="col-md-4 text-md-end text-center">
                <img
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500"
                    alt="Ilustrasi kegiatan belajar"
                >
            </div>
        </div>
    </div>

    {{-- Form Tambah Kursus --}}
    <div class="form-panel">

        <div class="mb-4">
            <h2 class="form-heading">Formulir Tambah Kursus</h2>
            <p class="form-description mb-0">
                Isi seluruh informasi yang diperlukan dengan benar.
                Kolom bertanda <span class="required-mark">*</span> wajib diisi.
            </p>
        </div>

        {{-- Pesan Validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- Kode Kursus --}}
                <div class="col-md-6">
                    <label for="code" class="form-label">
                        Kode Kursus <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        id="code"
                        name="code"
                        class="form-control @error('code') is-invalid @enderror"
                        maxlength="20"
                        value="{{ old('code') }}"
                        placeholder="Contoh: WEB-101"
                        required
                    >

                    @error('code')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Kursus --}}
                <div class="col-md-6">
                    <label for="name" class="form-label">
                        Nama Kursus <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        maxlength="120"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama kursus"
                        required
                    >
                </div>

                {{-- Deskripsi --}}
                <div class="col-12">
                    <label for="description" class="form-label">
                        Deskripsi Kursus
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Jelaskan materi atau tujuan kursus..."
                    >{{ old('description') }}</textarea>
                </div>

                {{-- Biaya --}}
                <div class="col-md-6">
                    <label for="fee" class="form-label">
                        Biaya Kursus (Rp) <span class="required-mark">*</span>
                    </label>

                    <input
                        type="number"
                        id="fee"
                        name="fee"
                        class="form-control"
                        min="0"
                        value="{{ old('fee', 0) }}"
                        placeholder="Contoh: 300000"
                        required
                    >
                </div>

                {{-- Kuota --}}
                <div class="col-md-6">
                    <label for="quota" class="form-label">
                        Kuota Peserta <span class="required-mark">*</span>
                    </label>

                    <input
                        type="number"
                        id="quota"
                        name="quota"
                        class="form-control"
                        min="1"
                        max="500"
                        value="{{ old('quota', 20) }}"
                        placeholder="Masukkan jumlah kuota"
                        required
                    >
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6">
                    <label for="start_date" class="form-label">
                        Tanggal Mulai <span class="required-mark">*</span>
                    </label>

                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        class="form-control"
                        value="{{ old('start_date') }}"
                        required
                    >
                </div>

                {{-- Status --}}
                <div class="col-md-6">
                    <label for="status" class="form-label">
                        Status Kursus <span class="required-mark">*</span>
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-select"
                        required
                    >
                        <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>
                            Closed
                        </option>
                    </select>
                </div>

            </div>

            <hr class="my-4" style="border-color:#e8f0eb;">

            {{-- Tombol --}}
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn-save">
                    ✓ Simpan Kursus
                </button>

                <a href="{{ route('courses.index') }}" class="btn-back">
                    ← Kembali
                </a>
            </div>

        </form>
    </div>

</div>

</div>@endsection