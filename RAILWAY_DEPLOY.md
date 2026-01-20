# Deploy to Railway - Instructions

Ikuti langkah berikut untuk deploy aplikasi ke Railway dengan static files yang benar:

## 1. Build Assets Locally
```bash
npm install
npm run build
```

## 2. Commit dan Push
```bash
git add .
git commit -m "Fix: Configure Vite for Railway deployment with static files"
git push
```

## 3. Set Environment Variables di Railway
Di Railway Dashboard:
1. Go to your project
2. Click "Settings" → "Variables"
3. Add/Update variables:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `ASSET_URL=/`
   - `APP_URL=https://your-railway-domain.com`

## 4. Deploy
Railway akan auto-deploy ketika Anda push. 

## ✅ Expected Result
- ✓ CSS akan terbaca di `/public/build/assets/`
- ✓ JS akan terbaca di `/public/build/assets/`
- ✓ Fonts dan images tetap terbaca di `/public/fonts/` dan `/public/images/`

## 🔍 Troubleshoot
Jika masih belum bekerja:

1. Check logs di Railway:
   ```bash
   railway logs
   ```

2. Verify file exist di build folder:
   ```bash
   ls -la public/build/
   ```

3. Check public/.htaccess rules untuk memastikan static files di-serve dengan benar

## 📝 Yang Sudah Diubah
- ✅ Procfile - Configure Apache to serve from public/
- ✅ vite.config.js - Output build ke public/build/
- ✅ config/app.php - Add ASSET_URL configuration
- ✅ .env.example - Add ASSET_URL variable
