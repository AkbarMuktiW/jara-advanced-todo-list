# SRS – JARA: Advanced Todo List

## 1. Deskripsi Sistem

JARA merupakan aplikasi web untuk mengelola tugas pribadi maupun tugas secara kolaboratif dalam tim. Pengguna dapat membuat daftar tugas atau **list/project**, menambahkan tugas, mengelompokkan tugas, menentukan prioritas dan tenggat waktu, serta memperbarui status penyelesaian tugas.

Pemilik list/project dapat mengundang pengguna lain untuk bergabung dan mengerjakan tugas secara bersama-sama. Sistem juga menyediakan pemantauan progres penyelesaian tugas pada setiap list/project.

Admin bertanggung jawab terhadap pengelolaan akun pengguna, termasuk menambahkan dan menghapus akun pengguna dalam sistem.

---

## 2. Aktor

| Aktor | Deskripsi |
|---|---|
| **Pengguna** | Pengguna yang memiliki akun dan dapat mengelola tugas pribadi maupun tugas dalam list/project. |
| **Pemilik List/Project** | Pengguna yang membuat list/project dan memiliki hak untuk mengelola daftar serta anggota. |
| **Anggota List/Project** | Pengguna yang diikutsertakan ke dalam list/project dan dapat mengerjakan tugas bersama. |
| **Admin** | Pengelola sistem yang bertanggung jawab terhadap pengelolaan akun pengguna. |

> **Catatan:** Pemilik List/Project dan Anggota List/Project tidak harus menjadi role akun terpisah. Keduanya dapat direpresentasikan melalui relasi `owner_id` dan `list_members`, sedangkan role pada `Users` cukup membedakan `USER` dan `ADMIN`.

---

## 3. User Story / Software Requirements

| ID | Aktor | User Story |
|---|---|---|
| **SRS-001** | Pengguna | Sebagai pengguna, saya bisa melakukan registrasi akun agar dapat menggunakan JARA. |
| **SRS-002** | Pengguna | Sebagai pengguna, saya bisa melakukan login agar dapat mengakses fitur pengelolaan tugas. |
| **SRS-003** | Pengguna | Sebagai pengguna, saya bisa melakukan logout agar akun saya tidak tetap dalam keadaan login. |
| **SRS-004** | Pengguna | Sebagai pengguna, saya bisa membuat list/project baru untuk mengelompokkan tugas berdasarkan kebutuhan. |
| **SRS-005** | Pengguna | Sebagai pengguna, saya bisa melihat daftar list/project yang saya miliki atau ikuti. |
| **SRS-006** | Pemilik List/Project | Sebagai pemilik list/project, saya bisa mengubah informasi list/project agar tetap sesuai dengan kebutuhan. |
| **SRS-007** | Pemilik List/Project | Sebagai pemilik list/project, saya bisa menghapus list/project yang sudah tidak diperlukan. |
| **SRS-008** | Pengguna | Sebagai pengguna, saya bisa membuat tugas baru pada list/project tertentu agar pekerjaan dapat dicatat dan dikelola. |
| **SRS-009** | Pengguna | Sebagai pengguna, saya bisa melihat daftar tugas pada suatu list/project agar mengetahui pekerjaan yang harus dilakukan. |
| **SRS-010** | Pengguna | Sebagai pengguna, saya bisa mengubah informasi tugas agar informasi pekerjaan tetap sesuai dengan kondisi terbaru. |
| **SRS-011** | Pengguna | Sebagai pengguna, saya bisa menghapus tugas yang sudah tidak diperlukan. |
| **SRS-012** | Pengguna | Sebagai pengguna, saya bisa menentukan prioritas tugas agar dapat mengetahui tugas yang harus lebih dahulu dikerjakan. |
| **SRS-013** | Pengguna | Sebagai pengguna, saya bisa menetapkan tenggat waktu (deadline) pada tugas agar pekerjaan dapat diselesaikan sesuai jadwal. |
| **SRS-014** | Pengguna | Sebagai pengguna, saya bisa menandai tugas sebagai selesai setelah pekerjaan tersebut diselesaikan. |
| **SRS-015** | Pengguna | Sebagai pengguna, saya bisa mengubah status tugas agar progres pengerjaan tugas dapat diketahui. |
| **SRS-016** | Pengguna | Sebagai pengguna, saya bisa mengelompokkan tugas dalam list/project berdasarkan kebutuhan agar pengelolaan pekerjaan lebih terorganisir. |
| **SRS-017** | Pemilik List/Project | Sebagai pemilik list/project, saya bisa menambahkan pengguna lain sebagai anggota agar tugas dapat dikerjakan secara bersama-sama. |
| **SRS-018** | Pemilik List/Project | Sebagai pemilik list/project, saya bisa menghapus anggota dari list/project agar akses pengguna yang sudah tidak terlibat dapat dihentikan. |
| **SRS-019** | Anggota List/Project | Sebagai anggota list/project, saya bisa melihat tugas yang terdapat dalam list/project yang saya ikuti agar mengetahui pekerjaan yang harus dikerjakan. |
| **SRS-020** | Anggota List/Project | Sebagai anggota list/project, saya bisa mengerjakan dan memperbarui status tugas agar progres pekerjaan dapat diketahui oleh anggota lainnya. |
| **SRS-021** | Pemilik List/Project | Sebagai pemilik list/project, saya bisa melihat progres penyelesaian tugas agar dapat memantau perkembangan pekerjaan dalam project. |
| **SRS-022** | Pengguna | Sebagai pengguna, saya bisa melihat progres penyelesaian tugas pada list/project agar mengetahui persentase pekerjaan yang telah selesai. |
| **SRS-023** | Pengguna | Sebagai pengguna, saya bisa melihat tugas berdasarkan prioritas agar dapat menentukan pekerjaan yang perlu dikerjakan terlebih dahulu. |
| **SRS-024** | Pengguna | Sebagai pengguna, saya bisa melihat tugas berdasarkan tenggat waktu agar dapat mengetahui tugas yang memiliki deadline paling dekat. |
| **SRS-025** | Pengguna | Sebagai pengguna, saya bisa melihat tugas yang telah selesai dan belum selesai agar dapat mengetahui kondisi pekerjaan saya. |
| **SRS-026** | Admin | Sebagai admin, saya bisa menambahkan akun pengguna agar pengguna dapat menggunakan sistem. |
| **SRS-027** | Admin | Sebagai admin, saya bisa melihat daftar akun pengguna yang terdaftar dalam sistem. |
| **SRS-028** | Admin | Sebagai admin, saya bisa menghapus akun pengguna agar akun yang sudah tidak diperlukan tidak dapat menggunakan sistem. |
| **SRS-029** | Admin | Sebagai admin, saya bisa melihat informasi dasar pengguna untuk membantu pengelolaan akun dalam sistem. |

---

## 4. Ketentuan / Aturan Sistem

### Ketentuan Pengguna

1. Pengguna harus melakukan login untuk mengakses fitur pengelolaan tugas.
2. Setiap akun pengguna memiliki identitas yang unik.
3. Admin dapat menambahkan dan menghapus akun pengguna.
4. Pengguna hanya dapat mengelola list/project yang menjadi miliknya atau yang memiliki hak akses kepadanya.

### Ketentuan List/Project

5. Setiap list/project memiliki satu pemilik.
6. Pemilik list/project dapat menambahkan dan menghapus anggota.
7. List/project tidak dapat dibuat tanpa nama.
8. Sebuah list/project dapat memiliki banyak tugas.
9. Sebuah pengguna dapat memiliki atau mengikuti beberapa list/project.

### Ketentuan Tugas

10. Setiap tugas harus berada dalam suatu list/project.
11. Tugas memiliki minimal judul, status, dan prioritas.
12. Deadline bersifat opsional.
13. Status tugas dapat berupa:
    - Belum Dimulai
    - Sedang Dikerjakan
    - Selesai
14. Tugas yang sudah selesai dapat diubah kembali apabila pekerjaan perlu dikerjakan kembali.
15. Prioritas dapat berupa:
    - Rendah
    - Sedang
    - Tinggi

### Ketentuan Kolaborasi

16. Hanya pemilik list/project yang dapat menambahkan anggota.
17. Hanya pengguna yang menjadi anggota list/project yang dapat melihat tugas di dalamnya.
18. Anggota dapat memperbarui tugas sesuai hak akses yang diberikan.
19. Sistem menghitung progres berdasarkan jumlah tugas selesai dibandingkan total tugas.

---

## 5. Perhitungan Progres

Progres list/project dihitung menggunakan rumus:

```text
Progress = (Jumlah tugas selesai / Total tugas) × 100%
```

Contoh:

Jika terdapat 10 tugas dan 7 tugas telah selesai:

```text
Progress = (7 / 10) × 100%
         = 70%
```

Maka progres list/project adalah **70%**.

---

## 6. Hint Rancangan Database

### Users

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik pengguna |
| `name` | Nama pengguna |
| `email` | Email pengguna |
| `password` | Password pengguna |
| `role` | Role pengguna (`USER` / `ADMIN`) |
| `created_at` | Waktu pembuatan akun |

### Lists / Projects

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik list/project |
| `name` | Nama list/project |
| `description` | Deskripsi list/project |
| `owner_id` | ID pengguna sebagai pemilik |
| `created_at` | Waktu pembuatan |
| `updated_at` | Waktu terakhir diperbarui |

### List Members

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik anggota |
| `list_id` | ID list/project |
| `user_id` | ID pengguna |
| `joined_at` | Waktu pengguna bergabung |

### Tasks

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik tugas |
| `list_id` | ID list/project |
| `title` | Judul tugas |
| `description` | Deskripsi tugas |
| `priority` | Prioritas tugas |
| `status` | Status tugas |
| `deadline` | Tenggat waktu |
| `created_by` | ID pengguna pembuat tugas |
| `created_at` | Waktu pembuatan |
| `updated_at` | Waktu terakhir diperbarui |

### Task Assignees

| Atribut | Keterangan |
|---|---|
| `id` | Identitas unik assignment |
| `task_id` | ID tugas |
| `user_id` | ID pengguna yang ditugaskan |
| `assigned_at` | Waktu penugasan |

---

## 7. Relasi Utama Database

```text
USER 1 ─────── N LIST/PROJECT
                 │
                 │ 1
                 │
                 N
               TASK

USER N ─────── N LIST/PROJECT
      melalui LIST_MEMBERS

USER N ─────── N TASK
      melalui TASK_ASSIGNEES
```

### Ringkasan Kardinalitas

- Satu **User** dapat memiliki banyak **List/Project**.
- Satu **List/Project** memiliki satu **Owner/User**.
- Satu **List/Project** dapat memiliki banyak **Task**.
- Satu **User** dapat menjadi anggota banyak **List/Project** melalui `List Members`.
- Satu **Task** dapat ditugaskan kepada banyak **User** melalui `Task Assignees`.
