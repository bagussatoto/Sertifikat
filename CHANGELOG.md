# Changelog

All notable changes to this project will be documented in this file.

## [v1.0.0] - 2026-11-09

### Security & Hardening Updates
- **Password Authentication**: Enhanced login (`M_login.php`) and password change verification (`Model.php`) to support secure PHP `password_hash()` / `password_verify()` alongside backward-compatible MD5 verification.
- **Environment Database Configuration**: Added support for reading database credentials via environment variables (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`) with fallback to local defaults, accompanied by `.env.example`.
- **Git Hygiene**: Updated `.gitignore` to prevent committing temporary export files (`view.pdf`), application error logs, cache, and `.env` files.

### Bug Fixes & Stability Updates
- **PDF Generation & Permissions**: Replaced static `'view.pdf'` output with dynamic inline streaming (`Output($filename, 'I')`), preventing `fopen(view.pdf): failed to open stream: Permission denied` disk errors and file lock conflicts across concurrent users. Untracked and removed legacy `view.pdf` from git repository.
- **Login Session Headers**: Removed trailing whitespace and unnecessary closing PHP tag in `application/modules/login/models/M_login.php` to prevent `Cannot modify header information - headers already sent` errors during login session initialization.
- **Date Parsing**: Added input guard condition and array mapping in `application/libraries/Tanggal.php` (`tglbulanThn`) to prevent `Undefined offset: 1/2` and `Undefined variable: dataBulan` when processing empty or malformed date strings.
- **Certificate Preview Null Safety**: Added `isset()` checks for `tanggal_lahir`, `tanggal_mulai`, and `tanggal_selesai` in:
  - `application/modules/data_sertifikat/views/priview_sertifikat.php`
  - `application/modules/data_sertifikat/views/priviewhal1_sertifikat.php`
  - `application/modules/data_sertifikat/views/priviewhal2_sertifikat.php`
  preventing `Trying to get property of non-object` PHP notices.
