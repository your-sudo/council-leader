import React, { useState, useEffect } from 'react';
import { Plus, Edit, Users, BarChart, MessageSquare, User, Vote, CheckCircle, XCircle, Menu, X } from 'lucide-react';

const VotingAdminSidebar = () => {
  const [activeSection, setActiveSection] = useState('add-candidate');
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [candidates, setCandidates] = useState([
    { id: 1, name: 'Ahmad Rizki', position: 'Ketua OSIS', votes: 150, image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face', vision: 'Memajukan OSIS untuk semua', mission: 'Mengadakan kegiatan yang bermanfaat' },
    { id: 2, name: 'Siti Nurhaliza', position: 'Wakil Ketua OSIS', votes: 120, image: 'https://images.unsplash.com/photo-1494790108755-2616b332c1ce?w=150&h=150&fit=crop&crop=face', vision: 'Mendukung visi ketua OSIS', mission: 'Membantu koordinasi kegiatan' }
  ]);
  
  const [newCandidate, setNewCandidate] = useState({ name: '', image: '', vision: '', mission: '', position: 'Ketua OSIS' });
  const [showAddModal, setShowAddModal] = useState(false);
  const [addingFor, setAddingFor] = useState('');
  
  const [students] = useState([
    { id: 1, name: 'Budi Santoso', nis: '12345', voted: true },
    { id: 2, name: 'Dewi Sartika', nis: '12346', voted: false },
    { id: 3, name: 'Reza Pratama', nis: '12347', voted: true },
    { id: 4, name: 'Indah Permata', nis: '12348', voted: false },
    { id: 5, name: 'Farhan Alamsyah', nis: '12349', voted: true }
  ]);
  
  const [suggestions] = useState([
    { id: 1, name: 'Anonymous', message: 'Sistem voting sudah bagus, tapi perlu ada konfirmasi ulang sebelum submit.' },
    { id: 2, name: 'Siswa Kelas 12', message: 'Mungkin bisa ditambahkan fitur melihat profil kandidat lebih detail.' },
    { id: 3, name: 'Monitor Kelas', message: 'Terima kasih sudah membuat sistem yang mudah digunakan!' }
  ]);

  const menuItems = [
    { id: 'add-candidate', icon: Plus, label: 'Add Candidate', color: 'bg-blue-500' },
    { id: 'student-table', icon: Users, label: 'Tabel Siswa', color: 'bg-green-500' },
    { id: 'diagram', icon: BarChart, label: 'Diagram', color: 'bg-purple-500' },
    { id: 'suggestions', icon: MessageSquare, label: 'Saran & Masukan', color: 'bg-orange-500' }
  ];

  const addCandidate = () => {
    if (newCandidate.name.trim()) {
      const candidate = {
        id: candidates.length + 1,
        name: newCandidate.name,
        position: addingFor,
        votes: 0,
        image: newCandidate.image || `https://images.unsplash.com/photo-${Math.random() > 0.5 ? '1507003211169-0a1dd7228f2d' : '1494790108755-2616b332c1ce'}?w=150&h=150&fit=crop&crop=face`,
        vision: newCandidate.vision,
        mission: newCandidate.mission
      };
      setCandidates([...candidates, candidate]);
      setNewCandidate({ name: '', image: '', vision: '', mission: '', position: 'Ketua OSIS' });
      setShowAddModal(false);
      setAddingFor('');
    }
  };

  const openAddModal = (position) => {
    setAddingFor(position);
    setShowAddModal(true);
  };

  const ketuaVotes = candidates.filter(c => c.position === 'Ketua OSIS').reduce((sum, c) => sum + c.votes, 0);
  const wakilVotes = candidates.filter(c => c.position === 'Wakil Ketua OSIS').reduce((sum, c) => sum + c.votes, 0);
  const totalVotes = ketuaVotes + wakilVotes;

  const renderAddCandidate = () => (
    <div className="space-y-6 animate-fadeIn">
      <div className="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
        <div className="flex justify-between items-center mb-4">
          <h3 className="text-xl font-bold text-gray-800 flex items-center">
            <User className="mr-2 text-blue-600" size={20} />
            Ketua OSIS
          </h3>
          <button
            onClick={() => openAddModal('Ketua OSIS')}
            className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2"
          >
            <Plus size={16} />
            <span>Tambah</span>
          </button>
        </div>
        
        <div className="space-y-3">
          {candidates.filter(c => c.position === 'Ketua OSIS').length === 0 ? (
            <div className="text-center py-8 text-gray-500">
              <User size={48} className="mx-auto mb-2 opacity-50" />
              <p>Belum ada kandidat Ketua OSIS</p>
            </div>
          ) : (
            candidates.filter(c => c.position === 'Ketua OSIS').map((candidate, index) => (
              <div
                key={candidate.id}
                className="bg-white p-4 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-500 animate-slideInRight"
                style={{ animationDelay: `${index * 200}ms` }}
              >
                <div className="flex items-center space-x-4">
                  <img
                    src={candidate.image}
                    alt={candidate.name}
                    className="w-16 h-16 rounded-full object-cover border-4 border-blue-100"
                  />
                  <div className="flex-1">
                    <h5 className="font-bold text-gray-800">{candidate.name}</h5>
                    <p className="text-blue-600 font-medium">{candidate.position}</p>
                    <p className="text-sm text-gray-500">{candidate.votes} votes</p>
                    {candidate.vision && (
                      <p className="text-xs text-gray-600 mt-1 truncate">Visi: {candidate.vision}</p>
                    )}
                  </div>
                  <button className="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <Edit size={18} />
                  </button>
                </div>
              </div>
            ))
          )}
        </div>
      </div>

      <div className="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
        <div className="flex justify-between items-center mb-4">
          <h3 className="text-xl font-bold text-gray-800 flex items-center">
            <Users className="mr-2 text-green-600" size={20} />
            Wakil Ketua OSIS
          </h3>
          <button
            onClick={() => openAddModal('Wakil Ketua OSIS')}
            className="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center space-x-2"
          >
            <Plus size={16} />
            <span>Tambah</span>
          </button>
        </div>
        
        <div className="space-y-3">
          {candidates.filter(c => c.position === 'Wakil Ketua OSIS').length === 0 ? (
            <div className="text-center py-8 text-gray-500">
              <Users size={48} className="mx-auto mb-2 opacity-50" />
              <p>Belum ada kandidat Wakil Ketua OSIS</p>
            </div>
          ) : (
            candidates.filter(c => c.position === 'Wakil Ketua OSIS').map((candidate, index) => (
              <div
                key={candidate.id}
                className="bg-white p-4 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-500 animate-slideInRight"
                style={{ animationDelay: `${index * 200}ms` }}
              >
                <div className="flex items-center space-x-4">
                  <img
                    src={candidate.image}
                    alt={candidate.name}
                    className="w-16 h-16 rounded-full object-cover border-4 border-green-100"
                  />
                  <div className="flex-1">
                    <h5 className="font-bold text-gray-800">{candidate.name}</h5>
                    <p className="text-green-600 font-medium">{candidate.position}</p>
                    <p className="text-sm text-gray-500">{candidate.votes} votes</p>
                    {candidate.vision && (
                      <p className="text-xs text-gray-600 mt-1 truncate">Visi: {candidate.vision}</p>
                    )}
                  </div>
                  <button className="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                    <Edit size={18} />
                  </button>
                </div>
              </div>
            ))
          )}
        </div>
      </div>

      {showAddModal && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl p-6 w-full max-w-md max-h-[90vh] overflow-y-auto animate-scaleIn">
            <div className="flex justify-between items-center mb-4">
              <h4 className="text-xl font-bold text-gray-800">
                Tambah {addingFor}
              </h4>
              <button
                onClick={() => setShowAddModal(false)}
                className="p-2 hover:bg-gray-100 rounded-lg transition-colors"
              >
                <X size={20} />
              </button>
            </div>
            
            <div className="space-y-4">
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Foto Profil (URL)</label>
                <input
                  type="url"
                  value={newCandidate.image}
                  onChange={(e) => setNewCandidate({...newCandidate, image: e.target.value})}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                  placeholder="https://example.com/image.jpg"
                />
                {newCandidate.image && (
                  <div className="mt-2 flex justify-center">
                    <img
                      src={newCandidate.image}
                      alt="Preview"
                      className="w-20 h-20 rounded-full object-cover border-4 border-gray-200"
                      onError={(e) => {
                        e.target.src = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face';
                      }}
                    />
                  </div>
                )}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input
                  type="text"
                  value={newCandidate.name}
                  onChange={(e) => setNewCandidate({...newCandidate, name: e.target.value})}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                  placeholder="Masukkan nama lengkap"
                />
              </div>
              
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Visi</label>
                <textarea
                  value={newCandidate.vision}
                  onChange={(e) => setNewCandidate({...newCandidate, vision: e.target.value})}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                  rows="3"
                  placeholder="Masukkan visi kandidat"
                />
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Misi</label>
                <textarea
                  value={newCandidate.mission}
                  onChange={(e) => setNewCandidate({...newCandidate, mission: e.target.value})}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                  rows="4"
                  placeholder="Masukkan misi kandidat"
                />
              </div>

              <div className="flex space-x-3 pt-4">
                <button
                  onClick={() => setShowAddModal(false)}
                  className="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors"
                >
                  Batal
                </button>
                <button
                  onClick={addCandidate}
                  disabled={!newCandidate.name.trim()}
                  className="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg hover:from-blue-700 hover:to-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 font-medium"
                >
                  Tambah Kandidat
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );

  const renderStudentTable = () => (
    <div className="animate-fadeIn">
      <div className="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
        <h3 className="text-xl font-bold text-gray-800 mb-4 flex items-center">
          <Users className="mr-2 text-green-600" size={20} />
          Tabel Siswa
        </h3>
        
        <div className="overflow-x-auto">
          <table className="w-full bg-white rounded-lg overflow-hidden shadow-sm">
            <thead className="bg-gradient-to-r from-green-600 to-emerald-600 text-white">
              <tr>
                <th className="px-4 py-3 text-left font-medium">Nama</th>
                <th className="px-4 py-3 text-left font-medium">NIS</th>
                <th className="px-4 py-3 text-center font-medium">Status</th>
              </tr>
            </thead>
            <tbody>
              {students.map((student, index) => (
                <tr
                  key={student.id}
                  className={`border-b border-gray-100 hover:bg-gray-50 transition-colors animate-slideIn ${
                    index % 2 === 0 ? 'bg-gray-25' : 'bg-white'
                  }`}
                  style={{ animationDelay: `${index * 50}ms` }}
                >
                  <td className="px-4 py-3 font-medium text-gray-800">{student.name}</td>
                  <td className="px-4 py-3 text-gray-600">{student.nis}</td>
                  <td className="px-4 py-3 text-center">
                    {student.voted ? (
                      <span className="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <CheckCircle size={14} className="mr-1" />
                        Sudah Vote
                      </span>
                    ) : (
                      <span className="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                        <XCircle size={14} className="mr-1" />
                        Belum Vote
                      </span>
                    )}
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
        
        <div className="mt-4 text-sm text-gray-600">
          Total: {students.length} siswa • 
          Sudah vote: {students.filter(s => s.voted).length} • 
          Belum vote: {students.filter(s => !s.voted).length}
        </div>
      </div>
    </div>
  );

  const renderDiagram = () => (
    <div className="space-y-6 animate-fadeIn">
      <div className="bg-gradient-to-r from-purple-50 to-violet-50 p-6 rounded-xl border border-purple-100">
        <h3 className="text-xl font-bold text-gray-800 mb-6 flex items-center">
          <BarChart className="mr-2 text-purple-600" size={20} />
          Diagram Suara
        </h3>
        
        <div className="space-y-6">
          <div className="bg-white p-4 rounded-lg shadow-sm">
            <h4 className="font-semibold text-gray-800 mb-3">Ketua OSIS</h4>
            <div className="space-y-2">
              {candidates.filter(c => c.position === 'Ketua OSIS').map((candidate, index) => (
                <div key={candidate.id} className="animate-slideIn" style={{ animationDelay: `${index * 200}ms` }}>
                  <div className="flex justify-between items-center mb-1">
                    <span className="text-sm font-medium text-gray-700">{candidate.name}</span>
                    <span className="text-sm font-bold text-purple-600">{candidate.votes}</span>
                  </div>
                  <div className="w-full bg-gray-200 rounded-full h-3">
                    <div
                      className="bg-gradient-to-r from-purple-500 to-violet-500 h-3 rounded-full transition-all duration-1000 ease-out"
                      style={{ width: ketuaVotes > 0 ? `${(candidate.votes / ketuaVotes) * 100}%` : '0%' }}
                    ></div>
                  </div>
                </div>
              ))}
            </div>
            <div className="mt-3 text-right text-sm text-gray-600">
              Total: <span className="font-bold text-purple-600">{ketuaVotes}</span> suara
            </div>
          </div>

          <div className="bg-white p-4 rounded-lg shadow-sm">
            <h4 className="font-semibold text-gray-800 mb-3">Wakil Ketua OSIS</h4>
            <div className="space-y-2">
              {candidates.filter(c => c.position === 'Wakil Ketua OSIS').map((candidate, index) => (
                <div key={candidate.id} className="animate-slideIn" style={{ animationDelay: `${(index + 2) * 200}ms` }}>
                  <div className="flex justify-between items-center mb-1">
                    <span className="text-sm font-medium text-gray-700">{candidate.name}</span>
                    <span className="text-sm font-bold text-purple-600">{candidate.votes}</span>
                  </div>
                  <div className="w-full bg-gray-200 rounded-full h-3">
                    <div
                      className="bg-gradient-to-r from-indigo-500 to-blue-500 h-3 rounded-full transition-all duration-1000 ease-out"
                      style={{ width: wakilVotes > 0 ? `${(candidate.votes / wakilVotes) * 100}%` : '0%' }}
                    ></div>
                  </div>
                </div>
              ))}
            </div>
            <div className="mt-3 text-right text-sm text-gray-600">
              Total: <span className="font-bold text-blue-600">{wakilVotes}</span> suara
            </div>
          </div>

          <div className="bg-gradient-to-r from-gray-50 to-gray-100 p-4 rounded-lg">
            <div className="text-center">
              <div className="text-2xl font-bold text-gray-800">{totalVotes}</div>
              <div className="text-sm text-gray-600">Total Suara Masuk</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );

  const renderSuggestions = () => (
    <div className="animate-fadeIn">
      <div className="bg-gradient-to-r from-orange-50 to-amber-50 p-6 rounded-xl border border-orange-100">
        <h3 className="text-xl font-bold text-gray-800 mb-4 flex items-center">
          <MessageSquare className="mr-2 text-orange-600" size={20} />
          Saran dan Masukan
        </h3>
        
        <div className="space-y-4">
          {suggestions.map((suggestion, index) => (
            <div
              key={suggestion.id}
              className="bg-white p-4 rounded-lg shadow-sm border-l-4 border-orange-400 hover:shadow-md transition-shadow animate-slideIn"
              style={{ animationDelay: `${index * 150}ms` }}
            >
              <div className="flex items-start space-x-3">
                <div className="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                  <User size={16} className="text-orange-600" />
                </div>
                <div className="flex-1">
                  <div className="font-medium text-gray-800 mb-1">{suggestion.name}</div>
                  <p className="text-gray-600 text-sm leading-relaxed">{suggestion.message}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
        
        <div className="mt-6 p-4 bg-orange-100 rounded-lg">
          <p className="text-sm text-orange-800 text-center">
            💡 Total {suggestions.length} saran dan masukan telah diterima
          </p>
        </div>
      </div>
    </div>
  );

  const renderContent = () => {
    switch (activeSection) {
      case 'add-candidate': return renderAddCandidate();
      case 'student-table': return renderStudentTable();
      case 'diagram': return renderDiagram();
      case 'suggestions': return renderSuggestions();
      default: return renderAddCandidate();
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
      <div className="lg:hidden fixed top-4 left-4 z-50">
        <button
          onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          className="p-3 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow"
        >
          {isMobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      <div className="flex">
        <div className={`fixed lg:static inset-y-0 left-0 z-40 w-80 bg-white shadow-2xl transform transition-transform duration-300 ease-in-out ${
          isMobileMenuOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
        }`}>
          <div className="h-full overflow-y-auto">
            <div className="p-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
              <div className="flex items-center space-x-3">
                <div className="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                  <Vote size={24} />
                </div>
                <div>
                  <h1 className="text-xl font-bold">Admin Panel</h1>
                  <p className="text-blue-100 text-sm">Sistem Voting OSIS</p>
                </div>
              </div>
            </div>

            <div className="p-4 space-y-2">
              {menuItems.map((item, index) => (
                <button
                  key={item.id}
                  onClick={() => {
                    setActiveSection(item.id);
                    setIsMobileMenuOpen(false);
                  }}
                  className={`w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 animate-slideIn ${
                    activeSection === item.id
                      ? 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white shadow-lg transform scale-105'
                      : 'text-gray-700 hover:bg-gray-100 hover:transform hover:scale-102'
                  }`}
                  style={{ animationDelay: `${index * 100}ms` }}
                >
                  <div className={`w-8 h-8 rounded-lg flex items-center justify-center ${
                    activeSection === item.id ? 'bg-white/20' : item.color
                  }`}>
                    <item.icon size={18} className={activeSection === item.id ? 'text-white' : 'text-white'} />
                  </div>
                  <span className="font-medium">{item.label}</span>
                </button>
              ))}
            </div>

            <div className="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 border-t">
              <div className="text-center text-sm text-gray-600">
                <p>© 2025 School Voting System</p>
                <p className="text-xs text-gray-500 mt-1">Admin Dashboard v1.0</p>
              </div>
            </div>
          </div>
        </div>

        <div className="flex-1 lg:ml-0 min-h-screen">
          <div className="p-4 lg:p-8 pt-20 lg:pt-8">
            <div className="max-w-4xl mx-auto">
              {renderContent()}
            </div>
          </div>
        </div>
      </div>

      {isMobileMenuOpen && (
        <div 
          className="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"
          onClick={() => setIsMobileMenuOpen(false)}
        ></div>
      )}

      <style jsx>{`
        @keyframes fadeIn {
          from { opacity: 0; transform: translateY(20px); }
          to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideIn {
          from { opacity: 0; transform: translateX(-20px); }
          to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
          from { opacity: 0; transform: translateX(50px); }
          to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes scaleIn {
          from { opacity: 0; transform: scale(0.9); }
          to { opacity: 1; transform: scale(1); }
        }
        
        .animate-fadeIn {
          animation: fadeIn 0.6s ease-out;
        }
        
        .animate-slideIn {
          animation: slideIn 0.6s ease-out;
        }
        
        .animate-slideInRight {
          animation: slideInRight 0.6s ease-out;
        }
        
        .animate-scaleIn {
          animation: scaleIn 0.3s ease-out;
        }
      `}</style>
    </div>
  );
};

export default VotingAdminSidebar;