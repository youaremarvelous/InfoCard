<template>
  <div class="info-card-container">
    <!-- Gradient Header -->
    <div class="gradient-header">
      <div class="content-wrapper">
        <div class="welcome-section">
          <h1 class="welcome-text">
            {{ card.welcomeMessage }}, <span class="user-name">{{ card.userName }}</span>!
          </h1>
          <p v-if="card.userEmail" class="user-email">{{ card.userEmail }}</p>
        </div>
        
        <div v-if="card.customerLogo" class="logo-section">
          <img :src="card.customerLogo" :alt="card.companyName" class="company-logo" />
        </div>
      </div>
    </div>

    <!-- Info Grid -->
    <div class="info-grid">
      <!-- System Info Card -->
      <div class="info-card">
        <div class="info-icon server-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
          </svg>
        </div>
        <div class="info-content">
          <span class="info-label">{{ card.serverVersionCaption }}</span>
          <span class="info-value">{{ card.serverVersion }}</span>
        </div>
      </div>

      <!-- Administrator Card -->
      <div class="info-card">
        <div class="info-icon admin-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <div class="info-content">
          <span class="info-label">{{ card.administratorCaption }}</span>
          <span class="info-value">{{ card.administrator }}</span>
        </div>
      </div>

      <!-- Company Card -->
      <div class="info-card">
        <div class="info-icon company-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
          </svg>
        </div>
        <div class="info-content">
          <span class="info-label">{{ card.companyCaption || 'Company' }}</span>
          <span class="info-value">{{ card.companyName }}</span>
        </div>
      </div>
    </div>

    <!-- Quick Links -->
    <div v-if="hasLinks" class="quick-links">
      <div class="links-inline">
        <a v-if="card.onlineHelpURL" 
           :href="card.onlineHelpURL" 
           target="_blank"
           class="link-text">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          {{ card.onlineHelpCaption }}
        </a>

        <span v-if="card.onlineHelpURL && (card.privacyURL || card.imprintURL)" class="separator">•</span>

        <a v-if="card.privacyURL" 
           :href="card.privacyURL" 
           target="_blank"
           class="link-text">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
          </svg>
          {{ card.privacyCaption }}
        </a>

        <span v-if="card.privacyURL && card.imprintURL" class="separator">•</span>

        <a v-if="card.imprintURL" 
           :href="card.imprintURL" 
           target="_blank"
           class="link-text">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
          </svg>
          {{ card.imprintCaption }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['card'],
  
  computed: {
    hasLinks() {
      return this.card.onlineHelpURL || this.card.privacyURL || this.card.imprintURL;
    }
  },
  
  mounted() {
    console.log('InfoCard loaded:', this.card);
  }
}
</script>

<style scoped>
.info-card-container {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* YAM Gradient Header */
.gradient-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
  padding: 2.5rem 2rem;
  color: white;
  position: relative;
  overflow: hidden;
}

.gradient-header::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, 
    rgba(102, 126, 234, 0.8) 0%, 
    rgba(118, 75, 162, 0.8) 50%, 
    rgba(240, 147, 251, 0.8) 100%);
  opacity: 0.9;
}

.content-wrapper {
  position: relative;
  z-index: 1;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 2rem;
}

.welcome-section {
  flex: 1;
}

.welcome-text {
  font-size: 2rem;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.user-name {
  font-weight: 800;
  background: linear-gradient(to right, #fff, #f0f0f0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.user-email {
  font-size: 1rem;
  opacity: 0.9;
  margin: 0;
}

.logo-section {
  flex-shrink: 0;
}

.company-logo {
  max-height: 80px;
  max-width: 200px;
  filter: brightness(0) invert(1);
  opacity: 0.95;
}

/* Info Grid */
.info-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  padding: 2rem;
  background: #f9fafb;
}

.info-card {
  background: white;
  border-radius: 10px;
  padding: 1.5rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.info-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
}

.info-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.info-icon svg {
  width: 24px;
  height: 24px;
  color: white;
}

.server-icon {
  background: linear-gradient(135deg, #667eea, #764ba2);
}

.admin-icon {
  background: linear-gradient(135deg, #f093fb, #f5576c);
}

.company-icon {
  background: linear-gradient(135deg, #4facfe, #00f2fe);
}

.info-content {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
  min-width: 0;
}

.info-label {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: #6b7280;
}

.info-value {
  font-size: 1rem;
  font-weight: 600;
  color: #111827;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Quick Links */
.quick-links {
  padding: 1.5rem 2rem;
  border-top: 1px solid #e5e7eb;
  background: #fafafa;
}

.links-inline {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.link-text {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 1rem;
  color: #667eea;
  text-decoration: none;
  font-weight: 500;
  font-size: 0.875rem;
  border-radius: 6px;
  transition: all 0.2s ease;
}

.link-text:hover {
  background: #667eea;
  color: white;
}

.link-text svg {
  width: 16px;
  height: 16px;
  flex-shrink: 0;
}

.separator {
  color: #d1d5db;
  font-weight: 300;
  user-select: none;
}

/* Responsive */
@media (max-width: 768px) {
  .content-wrapper {
    flex-direction: column;
    text-align: center;
  }
  
  .welcome-text {
    font-size: 1.5rem;
  }
  
  .info-grid {
    grid-template-columns: 1fr;
  }
  
  .links-grid {
    grid-template-columns: 1fr;
  }
}
</style>